<?php

namespace App\Http\Controllers;

use App\Banners;
use App\CategoryType;
use App\Content\ContentBanner;
use App\Content\ContentTag;
use App\HomePage;
use App\HomePageSection;
use App\Services;
use App\SiteInformation;
use App\Slider;
use App\Tag;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class HomePageSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, HomePage $homePage)
    {
        $homePageSections = HomePageSection::whereHomePage($homePage->id)->orderBy('position')->get();

        return view('home_page.edit', [
            'homePage' => $homePage, 
            'toShow' => "show_add_section",
            'homePageSections' => $homePageSections
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSection(Request $request, HomePage $homePage)
    {
        try {
            DB::beginTransaction();
            if ($request->input('section_type') == 'tags') {
                $contentTag = new ContentTag();
                $contentTag->setAttributes($request->all());
                $content = $contentTag;
            } elseif($request->input('section_type') == 'banner') {
                $bannerImages = $request->file('images');
                $bannerIds = $request->input('banner_ids');
                $bannerTitle = $request->input('banner_title');
                $bannerDescription = $request->input('banner_description');
                $bannerTargetUrls = $request->input('target_urls');
                $banner_info = [];

                foreach($bannerImages as $key => $image) {
                    $bannerId = $bannerIds[$key] ?? null;
                    $banner = $this->createBanner($image, $bannerId);
                    $bannerIds[$key] = $banner->id;
                    $bannerIds[$key] = $banner->id;
                    $banner_info[$key] = [
                        'bannerId' => $banner->id, 'banner_image' => $banner->banner_full_path,
                        'title' => $bannerTitle[$key] ?? "", 'description' => $bannerDescription[$key] ?? "",
                        'target_url' => $bannerTargetUrls[$key] ?? ""
                        ];
                }

                $requestData = $request->all();
                $requestData['banner_info'] = $banner_info;
                $contentBanner = new ContentBanner();
                $contentBanner->setAttributes($requestData);
                $content = $contentBanner;
            }

            $position = HomePageSection::whereHomePage($homePage->id)->count();
            HomePageSection::create([
                'home_page_id' => $homePage->id,
                'type' => $request->input('section_type'),
                'name' => $request->input('name'),
                'content' => $content,
                'position' => $position + 1
            ]);

            DB::commit();

            return redirect()->route('home_pages.edit', ['home_page' => $homePage->id, 'to_show' => 'section_container']);
        } catch(Exception $e) {
            DB::rollback();
            die($e->getMessage());
            return response(['status' => 'Cannot Save Section'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTag(Request $request, HomePage $homePage, HomePageSection $homePageSection)
    {
        $contentTag = $homePageSection->content;
        $tags = Tag::with('product_tags')->get();

        return view('home_page.edit', [
            'homePage' => $homePage, 
            'toShow' => "show_edit_tag_section",
            'homePageSection' => $homePageSection,
            'tags' => $tags,
            'contentTag' => $contentTag
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editBanner(Request $request, HomePage $homePage, HomePageSection $homePageSection)
    {
        $contentBanner = $homePageSection->content;

        
        return view('home_page.edit', [
            'homePage' => $homePage, 
            'toShow' => "show_edit_banner_section",
            'homePageSection' => $homePageSection,
            'contentBanner' => $contentBanner
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homePage, HomePageSection $homePageSection)
    {
        try {

            DB::beginTransaction();
            if ($request->input('section_type') == 'tags') {
                $contentTag = new ContentTag();
                $contentTag->setAttributes($request->all());
                $content = $contentTag;
            } elseif($request->input('section_type') == 'banner') {
                $bannerImages = $request->file('images');
                $bannerIds = $request->input('banner_ids');
                $bannerContent = $homePageSection->content;
                $banner_info = [];
                $bannerTitle = $request->input('banner_title');
                $bannerDescription = $request->input('banner_description');
                $bannerTargetUrls = $request->input('target_urls');
                //Set Old Values
                foreach($bannerIds as $key => $bannerId) {
                    $banner_info[$key] = $bannerContent->banner_info[$key];
                }

                //Set New Values
                if($bannerImages) {
                    foreach($bannerImages as $key => $image) {
                        $bannerId = $bannerIds[$key] ?? null;
                        $banner = $this->createBanner($image, $bannerId);
                        $bannerIds[$key] = $banner->id;
                        $banner_info[$key] = [
                            'bannerId' => $banner->id, 'banner_image' => $banner->banner_full_path,
                            'title' => $bannerTitle[$key] ?? "", 'description' => $bannerDescription[$key] ?? "",
                            'target_url' => $bannerTargetUrls[$key] ?? ""
                        ];
                    }
                }
                $requestData = $request->all();
                $requestData['style'] = $bannerContent->style;
                $requestData['banner_info'] = $banner_info;
                $contentBanner = new ContentBanner();
                $contentBanner->setAttributes($requestData);
                $content = $contentBanner;
            }
            $homePageSection->name = $request->input('name');
            $homePageSection->content = $content;
            $homePageSection->save();
            
            DB::commit();

            return redirect()->route('home_pages.edit', ['home_page' => $homePage->id, 'to_show' => 'section_container'])->with('status', 'Updated Successfully');
        } catch(Exception $e) {
            DB::rollback();
            die($e->getMessage());
            return response(['status' => 'Cannot Update Section'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HomePage $homePage, HomePageSection $homePageSection)
    {
        try {
            DB::beginTransaction();
            
            $homePageSection->delete();
            
            DB::commit();

            return redirect()->route('home_pages.edit', ['home_page' => $homePage->id, 'to_show' => 'section_container'])->with('status', 'Removed Successfully');
        } catch(Exception $e) {
            DB::rollback();
            die($e->getMessage());
            return response(['status' => 'Cannot Delete Section'], 500);
        }
    }

    public function createBanner($image, $bannerId = null)
    {
        $banner = $bannerId ?  Banners::find($bannerId) : new Banners();
        $banner->storeImage($image);
        $banner->sequence = 1;
        $banner->banner_size = null;
        $banner->save();

        return $banner;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\homePageSections  $homePageSections
     * @return \Illuminate\Http\Response
     */
    public function updateSequence(Request $request)
    {

        DB::beginTransaction();

        try
        {
            foreach($request->input('sequence') as $sequence => $id) {
                $homePageSection = HomePageSection::find($id);
                $homePageSection->position = $sequence + 1;
                $homePageSection->save();
            }
        } catch(Exception $e) {
            DB::rollback();
            response('Cannot Update Sequence', 500);
        }

        DB::commit();

        return response(['message' => 'Updated Successfully'], 200);
    }

    public function loadBannerStyle(Request $request, HomePage $homePage,  $styleId)
    {
        try {

            $bannerStyle = DB::table('banner_section_styles')->where('id', $styleId)->first();
            if($bannerStyle == null) {
                throw new ModelNotFoundException();
            }

            return view('banner_styles.' . $bannerStyle->file_name, ['mode' => 'edit']);
        } catch(ModelNotFoundException $e) {
            return response(['status' => false, "message" => $e->getMessage()], 404);
        } catch(Exception $e) {
            response('Cannot Update Sequence', 500);
        }
    }

    public function loadJs(Request $request, $fileName)
    {
        $path = resource_path('views/banner_styles/js/'. $fileName . '.js');
        if(file_exists($path)) {
            $content = file_get_contents($path);

            return response()->make($content)->header('Content-Type', 'application/javascript');
        }

    }

    public function renderSection(Request $request, HomePage $homePage, $homePageSectionId)
    {

        $siteInformation = SiteInformation::first();
        $sliders = Slider::orderBy('sequence')->get();
        $categoryTypes = CategoryType::orderBy('sequence')->get();
        $services = Services::orderBy('sequence');
        $servicesForEnquiries = Services::orderBy('sequence')->get();
        $homePageSections = HomePageSection::where('id', $homePageSectionId)->get();

        return view('home_page.make_view', [
            'siteInformation' => $siteInformation,
            'sliders' => $sliders,
            'categoryTypes' => $categoryTypes,
            'services' => $services,
            'servicesForEnquiries' => $servicesForEnquiries,
            'page' => 'home',
            'homePageSections' => $homePageSections
        ]);
    }
}
