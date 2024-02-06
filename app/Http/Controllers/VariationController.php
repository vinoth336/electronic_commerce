<?php

namespace App\Http\Controllers;

use App\Http\Requests\VariationAttributeRequest;
use App\Variation;
use App\VariationOption;
use Exception;
use Illuminate\Support\Facades\DB;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variations = Variation::orderBy('name')->get();

        return view('variation.list', ['variations' => $variations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variationOptions = VariationOption::orderBy('name')->get();

        return view('variation.create', ['variationOptions' => $variationOptions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VariationAttributeRequest $request)
    {
        try {
            DB::beginTransaction();
            $variation = new Variation();
            $attributes = $request->input('variation_attributes');
            $variation = $variation->createVariation($request->only('name', 'slug_name', 'status'));
            $variationOptions = $variation->variation_option()->findOrCreateOptions($attributes);
            $variation->variation_option_values()->sync($variationOptions);
            DB::commit();

            return redirect()->route('variation.list')->with('status', 'Created Successfully');
        } catch (Exception $e) {
            DB::rollback();
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
    public function edit(Variation $variation)
    {
        $variationOptions = VariationOption::orderBy('name')->get();

        return view('variation.edit', ['variation' => $variation, 'variationOptions' => $variationOptions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VariationAttributeRequest $request, Variation $variation)
    {
        try {
            DB::beginTransaction();
            $attributes = $request->input('variation_attributes');
            $variation->name = $request->input('name');
            $variation->slug_name = $request->input('slug_name');
            $variation->status = $request->input('status') ? 1 : 0;
            $variation->save();
            $variationOptions = $variation->variation_option()->findOrCreateOptions($attributes);
            $variation->variation_option_values()->sync($variationOptions);
            DB::commit();

            return redirect()->route('variation.index')->with('status', 'Updated Successfully');
        } catch (Exception $e) {
            DB::rollback();

            info('Getting Error in variationController@update '.$e->getMessage());
        }
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
}
