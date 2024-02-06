<?php

namespace App\Http\Controllers;

use App\CategoryType;
use App\HomePage;
use App\HomePageSection;
use App\Http\Requests\CreateHomePageRequest;
use App\Services;
use App\SiteInformation;
use App\Slider;
use App\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homePages = HomePage::get();

        return view('home_page.list', ['homePages' => $homePages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home_page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHomePageRequest $request)
    {
        try {
            DB::beginTransaction();
            $homePage = new HomePage();
            if ($request->input('make_view') == MAKE_VIEW_SPECIFIC_DATE) {
                if ($request->input('from_date') && $request->input('to_date')) {
                    $homePage->from_date = $request->input('from_date');
                    $homePage->to_date = $request->input('to_date');
                }
            }
            $homePage->name = $request->input('name');
            $homePage->status = $request->input('status') ? 1 : 0;
            $homePage->save();
            $homePage->refresh();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            return response(['status' => 'Cannot Import Images'], 500);
        }

        return redirect()->route('home_pages.edit', ['home_page' => $homePage->id, 'to_show' => 'section_container']);
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
    public function edit(Request $request, HomePage $homePage)
    {
        $toShow = $request->input('to_show') ?? 'home_page_container';
        $homePageSections = HomePageSection::whereHomePage($homePage->id)->orderBy('position')->get();

        return view('home_page.edit', [
            'homePage' => $homePage,
            'toShow' => $toShow,
            'homePageSections' => $homePageSections,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loadTagSection(Request $request, HomePage $homePage)
    {
        $tags = Tag::with('product_tags')->get();

        return view('home_page.section_tags', ['tags' => $tags, 'homePage' => $homePage]);
    }

    public function loadBannerSection(Request $request, HomePage $homePage)
    {
        return view('home_page.section_banner');
    }

    public function loadSection(Request $request, HomePage $homePage)
    {
        $sectionName = $request->sectionName ?? null;
        if ($sectionName == 'tags')
        {
            $tags = Tag::with('product_tags')->get();

            return view('home_page.section_tags', ['tags' => $tags, 'homePage' => $homePage]);
        } elseif($sectionName == 'banner') {
            return view('home_page.section_banner');
        } elseif ($sectionName == 'slider') {
            return view('home_page.section_main_slider');
        }


    }


    public function renderContent(Request $request, HomePage $homePage)
    {

        $siteInformation = SiteInformation::first();
        $sliders = Slider::orderBy('sequence')->get();
        $categoryTypes = CategoryType::orderBy('sequence')->get();
        $services = Services::orderBy('sequence');
        $servicesForEnquiries = Services::orderBy('sequence')->get();
        $homePageSections = $homePage->home_page_sections()->orderBy('home_page_sections.position')->get();

        return view('home_page.make_view', [
            'siteInformation' => $siteInformation,
            'sliders' => $sliders,
            'categoryTypes' => $categoryTypes,
            'services' => $services,
            'servicesForEnquiries' => $servicesForEnquiries,
            'page' => 'home',
            'homePageSections' => $homePageSections,
        ]);
    }

    public function makeDefault(Request $request, HomePage $homePage)
    {
        try {
            DB::beginTransaction();

            $previousHomePage = HomePage::where('is_default', 1)->first();
            if ($previousHomePage) {
                $previousHomePage->is_default = 0;
                $previousHomePage->save();
            }

            $homePage->is_default = 1;
            $homePage->save();
            DB::commit();

            $homePages = HomePage::get();

            return view('home_page.list', ['homePages' => $homePages])->with('status', 'Update Successfully');
        } catch (Exception $e) {
            DB::rollback();
            info($e->getMessage());

            return response(['status' => 'Cannot Import Images'], 500);
        }
    }
}
