<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::latest()->paginate(5);

        return view('ads.index',compact('ads'))
            ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'publication_date' => 'required',
        ]);

        //Smell code, fix it later unifying errors, now priorize tdd.

        $ad = new Ad($request->all());

        $response = $ad->checkIfTitleHasMoreThanLimitChart();
        
        if($response == true){
            
            return redirect()->route('ads.create')->withErrors('You can not write more than 50 charts.');
        }

        $response = $ad->checkIfTitleAndDescriptionAreTheSame();

        if($response == true){
            
            return redirect()->route('ads.create')->withErrors('The title and description can not be the same.');
        }

        $response = $ad->checkIfAdsAreGreaterThanLimit();

        if($response == true){
            
            return redirect()->route('ads.create')->withErrors('The oldest ad that currently exists has to be removed.');
        }

        Ad::create($request->all());

        return redirect()->route('ads.index')->with('success','Ad added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        return view('ads.show',compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect()->route('ads.index')
            ->with('success', 'Ad deleted successfully.');
    }

    //delete expired ads with a cronjob (systems)
    public function expire(Ad $ad)
    {
        if($ad->checkIfAdExpireProperlyOnTheIndicatedDate()){
            return  false;
        }
        $ad->delete();
        return true;
        
    }
}
