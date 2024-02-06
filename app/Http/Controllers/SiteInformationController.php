<?php

namespace App\Http\Controllers;

use App\SiteInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteInformation = SiteInformation::first();

        return view('site_information.create')->with(['siteInformation' => $siteInformation]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {


            $siteInformation = SiteInformation::first();
            $siteInformation->site_name = $request->input('site_name');
            $siteInformation->meta_description = $request->input('meta_description');
            $siteInformation->facebook_id = $request->input('facebook_id');
            $siteInformation->instagram_id = $request->input('instagram_id');
            $siteInformation->phone_no = $request->input('phone_no');
            $siteInformation->email_id = $request->input('email_id');
            $siteInformation->lat = $request->input('lat');
            $siteInformation->long = $request->input('long');
            $siteInformation->working_hours_mon_fri = $request->input('working_hours_mon_fri');
            $siteInformation->working_hours_sat = $request->input('working_hours_sat');
            $siteInformation->working_hours_sun = $request->input('working_hours_sun');
            $image = $request->has('logo') ? $request->file('logo') : null;
            $siteInformation->storeImage($image);
            $favIcon = $request->has('fav_icon') ? $request->file('fav_icon') : null;
            $storagePath = public_path('web/images/logo/');
            $favIconStoragePathName = now()->format('YmdHis').'_favicon.ico';

            //Unlink FavIcon
            if ($favIcon) {
                $siteInformation->unlinkImage($siteInformation->fav_icon);
                if (move_uploaded_file($favIcon->getRealPath(), $storagePath . $favIconStoragePathName)) {
                    $siteInformation->fav_icon = $favIconStoragePathName;
                } else {
                    $siteInformation->fav_icon = null;
                }
            }
            $siteInformation->save();
            setSiteInformationInCache();

        } catch (\Exception $exception) {

            dd($exception->getMessage());
        }
        return redirect()->route('site_information.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SiteInformation  $siteInformation
     * @return \Illuminate\Http\Response
     */
    public function show(SiteInformation $siteInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SiteInformation  $siteInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteInformation $siteInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SiteInformation  $siteInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteInformation $siteInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SiteInformation  $siteInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteInformation $siteInformation)
    {
        //
    }
}
