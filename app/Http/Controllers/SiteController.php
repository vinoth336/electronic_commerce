<?php

namespace App\Http\Controllers;

use App\Banners;
use App\Brand;
use App\CategoryType;
use App\Faqs;
use App\HomePage;
use App\Product;
use App\ProductImage;
use App\Services;
use App\SiteInformation;
use App\Slider;
use App\Testimonial;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SiteController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $siteInformation = SiteInformation::first();
        $sliders = Slider::orderBy('sequence')->get();
        $categoryTypes = CategoryType::orderBy('sequence')->get();
        $services = Services::orderBy('sequence');
        $servicesForEnquiries = Services::orderBy('sequence')->get();
        $allProducts = Product::activeProject()->with('ProductImages')->limit(50)->orderBy('sequence')->get();
        $homePage = HomePage::where('is_default', 1)->first();
        $homePageSections = $homePage->home_page_sections()->orderBy('home_page_sections.position')->get();
        $brands = Brand::orderBy('name')->get();

        return view('site.home', [
            'siteInformation' => $siteInformation,
            'sliders' => $sliders,
            'categoryTypes' => $categoryTypes,
            'services' => $services,
            'servicesForEnquiries' => $servicesForEnquiries,
            'boxBanners' => $boxBanners ?? null,
            'verticalBanner' => $verticalBanner ?? new Banners(),
            'verticalWideBanner' => $verticalWideBanner ?? new Banners(),
            'allProducts' => $allProducts,
            'page' => 'home',
            'brands' => $brands,
            'homePageSections' => $homePageSections
        ]);
    }

    public function services(Request $request, $slug = null)
    {
        $siteInformation = SiteInformation::first();
        $services = Services::orderBy('sequence')->get();
        try {
            if ($slug) {
                $service = Services::where('slug', $slug)->first();
                if ($service) {
                    return view('site.service_single', [
                        'siteInformation' => $siteInformation,
                        'service' => $service
                    ]);
                } else {
                    throw new ModelNotFoundException();
                }
            } else {
                return view('site.service_multiple', [
                    'siteInformation' => $siteInformation,
                    'services' => $services
                ]);
            }
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return response(['status' => "Service Not Found"], 404);
        }
    }

    public function viewProductSummary(Request $request, Product $product)
    {
        $product->load('ProductImages')->orderBy('sequence')->first();

        return view('site.show_single_item_summary')->with('product', $product);
    }

    public function viewProduct(Request $request, Product $product)
    {
        $product->load('ProductImages')->orderBy('sequence')->first();
        $relatedProducts = $product->getRelatedProducts();
        $relatedCategories = [];
        foreach($product->services()->pluck('slug')->toArray() as $cat) {
            $relatedCategories[] = "categories[]=" . $cat;
        }

        return view('site.view_single_product')
        ->with('productDetail', $product)
        ->with('relatedProducts', $relatedProducts)
        ->with('relatedCategories', implode("&", $relatedCategories))
        ;
    }


    public function product()
    {
        $siteInformation = SiteInformation::first();
        $products = Product::activeProject()->orderBy('sequence')->get();

        return view(
            'site.product',
            [
                'products' => $products,
                'siteInformation' => $siteInformation
            ]
        );
    }

    public function faqs()
    {
        $siteInformation = SiteInformation::first();
        $faqs = Faqs::orderBy('sequence')->get();
        $services = Services::orderBy('sequence')->get();
        return view('site.faqs', ['siteInformation' => $siteInformation, 'faqs' => $faqs, 'services' => $services]);
    }

    public function saveEnquiry()
    {
    }
}
