<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Exports\ExportProductData;
use App\Features;
use App\FeatureValue;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\GetSlugNameRequest;
use App\Http\Requests\ImportProductImageRequest;
use App\Imports\ImportProduct;
use App\Product;
use App\ProductImage;
use App\Services;
use App\Specification;
use App\SpecificationValue;
use App\SubCategory;
use App\Tag;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Psy\Util\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ProductImages = Product::with('brand', 'productImages')->OrderBy('name')->get();

        return view('product.list', ['products' => $ProductImages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $services = $this->getServices()->orderBy('sequence')->get();
        $subCategories = SubCategory::orderBy('sequence')->get();
        $specifications = Specification::orderBy('name')->get();
        $specificationValues = SpecificationValue::orderBy('name')->get();
        $features = Features::orderBy('name')->get();
        $featureValues = FeatureValue::orderBy('name')->get();
        $tags = Tag::get();
        $brands = Brand::get();

        return view('product.create', [
            'services' => $services, 
            'brands' => $brands, 
            'subCategories' => $subCategories, 
            'specifications' => $specifications,
            'specificationValues' => $specificationValues,
            'features' => $features,
            'featureValues' => $featureValues,
            'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateServiceRequest $request)
    {

        DB::beginTransaction();
        try {
            $this->saveProduct(new Product(), $request);

            DB::commit();

            return redirect()->route('product.index')->with('status', 'Created Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response(['status' => "Can't Store Data", "message" => $e->getMessage()], 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import_product(Request $request)
    {
        if ($request->get('type') == 'product') {
            return view('product.import');
        } else {
            return view('product.import_image');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $services = $this->getServices()->orderBy('sequence')->get();
        $subCategories = SubCategory::orderBy('sequence')->get();
        $brands = Brand::get();
        $tags = Tag::get();
        $specifications = Specification::orderBy('name')->get();
        $specificationValues = SpecificationValue::orderBy('name')->get();
        $features = Features::orderBy('name')->get();
        $featureValues = FeatureValue::orderBy('name')->get();
        $productSpecifications = $product->product_specification_values()->with(['specifications', 'specification_values'])->orderBy('sequence')->get();
        $productFeatures = $product->product_feature_values()->with(['features', 'feature_values'])->orderBy('sequence')->get();
        
        return view('product.edit')->with([
            'product' => $product,
            'services' => $services,
            'brands' => $brands,
            'subCategories' => $subCategories,
            'specifications' => $specifications,
            'specificationValues' => $specificationValues,
            'features' => $features,
            'featureValues' => $featureValues,
            'productSpecifications' => $productSpecifications,
            'productFeatures' => $productFeatures,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateServiceRequest $request, Product $product)
    {
        DB::beginTransaction();
        try {

            $this->saveProduct($product, $request);

            DB::commit();

            return redirect()->route('product.index')->with('status', 'Created Successfully');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response(['status' => "Can't Store Data"], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        DB::beginTransaction();

        try {

            if($product->ProductImages()->count() > 0) {
                foreach ($product->ProductImages as $ProductImage) {
                    $ProductImage->unlinkImage($ProductImage->image);
                }
                $product->ProductImages()->delete();
            }
            $product->services()->detach();
            $product->delete();

            DB::commit();

            return response(['status' => true, "message" => "Removed Successfully"], 200);
        } catch(ModelNotFoundException $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response(['status' => false, "message" => $e->getMessage()], 404);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response(['status' => false, "message" => $e->getMessage()], 500);
        }
    }

    public function updateSequence(Request $request)
    {

        DB::beginTransaction();

        try {
            foreach ($request->input('sequence') as $sequence => $id) {
                $product = Product::find($id);
                $product->sequence = $sequence + 1;
                $product->save();
            }
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            response(['status' => 'Cannot Update Sequence'], 500);
        }

        DB::commit();

        return response(['message' => 'Updated Successfully'], 200);
    }


    /**
     * Create or Update the Product in storage
     *
     * @param PortfolioImageRequest $request
     * @param Product $Product
     * @return Product
     */
    public function saveProduct($product, $request)
    {
        $portfolioBanner = $request->file('portfolio_banner_image') ?? null;
        $product->storeImage($portfolioBanner, ['width' => 161, 'height' => 161]);
        $product->name = $request->input('name');
        $product->slug = str_slug($request->input('name'));
        $product->brand_id = $request->input('brand');
        $product->sub_category_id = $request->input('sub_category');
        $product->product_code = $request->input('product_code');
        $product->description = $request->input('description');
        $product->price = (float) $request->input('price');
        $product->discount_amount = (float) $request->input('discount_amount');
        $product->sequence = $product->sequence ?? Product::count() + 1;
        $product->status = $request->has('status') ? 1 : 0;
        $product->save();
        $product->services()->sync($request->input('services'));
        $tagIds = $this->findOrCreate('Tag', $request->tags ?? []);
        $product->product_tags()->sync($tagIds);
        $specificationHighlighted = $request->specification_highlights ?? [];
        $specificationIds = $this->findOrCreate('Specification', $request->specifications ?? []);
        $specificationValuesIds = $this->findOrCreate('SpecificationValue', $request->specification_values ?? []);
        $key = 0;
        $productSpecificationValues = [];
        foreach ($specificationIds as $specificationId) {
            $isHighlighted = $specificationHighlighted[$key] ?? null;
            $specificationValueId = $specificationValuesIds[$key] ?? null;
            $productSpecificationValues[$specificationId] =
                ['product_id' => $product->id, 'specification_id' => $specificationId, 'specification_value_id' => $specificationValueId, 'highlighted' => $isHighlighted, 'sequence' => $key + 1, 'block_id' => null];
            $key++;
        }
        $product->product_specification_values()->delete();
        $product->product_specification_values()->insert($productSpecificationValues);
        $featureHighlighted = $request->feature_highlights ?? [];
        $featureIds = $this->findOrCreate('Features', $request->features ?? []);
        $featureValuesIds = $this->findOrCreate('FeatureValue', $request->feature_values ?? []);
        $key = 0;
        $productFeatureValues = [];
        foreach ($featureIds as $featureId) {
            $isHighlighted = $featureHighlighted[$key] ?? null;
            $featureValueId = $featureValuesIds[$key] ?? null;
            $productFeatureValues[$featureId] =
                ['product_id' => $product->id, 'feature_id' => $featureId, 'feature_value_id' => $featureValueId, 'highlighted' => $isHighlighted, 'sequence' => $key + 1, 'block_id' => null];
            $key++;
        }
        $product->product_feature_values()->delete();
        $product->product_feature_values()->insert($productFeatureValues);
        $product->touch(); // This will help to add in cache
        if ($request->has('product_images')) {
            $portfolioImageCount = $product->ProductImages()->count() + 1;
            $images = $request->file('product_images');
            foreach ($images as $image) {
                $ProductImage = new ProductImage();
                $ProductImage->storeImage($image, ['width' => 230, 'height' => 230]);
                $ProductImage->sequence = $portfolioImageCount++;
                $product->ProductImages()->save($ProductImage);
            }
        }

        return $product;
    }

    public function getSlugName(GetSlugNameRequest $request)
    {
        if ($request->has('name')) {
            return ['slug_name' => str_slug($request->input('name'))];
        }

        return null;
    }

    public function getServices()
    {

        return new Services;
    }

    public function import(Request $request)
    {
        ini_set('max_execution_time', 180);
        DB::beginTransaction();

        try {
            Excel::import(new ImportProduct, request()->file('product_list'));
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            die($e->getMessage());
            response(['status' => 'Cannot Import File'], 500);
        }

        return redirect()->route('product.index')->with('status', 'Imported Product List Successfully');
    }



    public function import_image(ImportProductImageRequest $request)
    {

        DB::beginTransaction();
        try {
            $images = $request->file("product_images");
            $action = $request->input('action');
            $n = 0;
            $imp = 0;
            $temp = [];
            $productProcessed = [];
            foreach ($images as $image) {
                $fileInfo = pathinfo($image->getClientOriginalName());
                $fileDetail = explode("_",  $fileInfo['filename']);
                $productCode = $fileDetail[0]; //Product Code
                $product = Product::where('product_code', $productCode)->first();
                if ($product) {
                    if ($product->ProductImages()->count() > 0) {
                        if(in_array($action, ['override', 'override_update']) && !isset($productProcessed[$productCode])) {
                            foreach ($product->ProductImages as $ProductImage) {
                                $ProductImage->unlinkImage($ProductImage->image);
                            }
                            $productProcessed[$productCode] = 1;
                            $product->ProductImages()->delete();
                        }
                    }
                    $insertFlag = 0;
                    if($action == 'insert_for_no_image_record' && $product->ProductImages()->count() == 0) {
                        $insertFlag = 1;
                    } elseif($action != 'insert_for_no_image_record') {
                        $insertFlag = 1;
                    }
                    if($insertFlag) {
                        $portfolioImageCount = $product->ProductImages()->count() + 1;
                        $ProductImage = new ProductImage();
                        $ProductImage->storeImage($image, ['width' => 230, 'height' => 230]);
                        $ProductImage->sequence = $portfolioImageCount++;
                        $product->ProductImages()->save($ProductImage);
                        usleep(300);
                        $imp++;
                    } else {
                        $temp[] = $productCode;
                        $n++;
                    }
                } else {
                    $temp[] = $productCode;
                    $n++;
                }
            }

            DB::commit();

            return redirect()->route('product.import', ['type' => 'product_image'])
                ->with('status', 'Total Record : ' . count($images) . ',  Imported Image : ' . $imp . ', Not Matched record ' . $n . " - " . implode(",", $temp));
        } catch (Exception $e) {
            DB::rollback();
            die($e->getMessage());
            return response(['status' => 'Cannot Import Images'], 500);
        }
    }

    public function findOrCreate($model, $values)
    {
        $model = getModelName($model);
        $ids = [];
        foreach ($values as $value) 
        {
            $data = $model::firstOrCreate(['name' => $value]);
            $ids[] = (string) $data->id;
        }

        return $ids;
    }

    function export()
    {
        return Excel::download(new ExportProductData, 'products.xlsx');

    }
}
