<?php

namespace App\Http\Controllers;

use App\LiveSearch;
use Illuminate\Http\Request;
use App\Services\LiveSearchService;


class LiveSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('livesearchs.index');
    }

    public function search(Request $request)
    {
        $q = $request->input('q');
        $entries = (new LiveSearchService())->getLiveSearchResult($request->input('q'));
        //dd($entries[0]->fileNo);
        if($entries != NULL)
        {
            return view('livesearchs.index', compact('entries', 'q'));
        }
        else{
            return view('livesearchs.index')->withMessage('No Data found');
        }
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LiveSearch  $liveSearch
     * @return \Illuminate\Http\Response
     */
    public function show(LiveSearch $liveSearch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LiveSearch  $liveSearch
     * @return \Illuminate\Http\Response
     */
    public function edit(LiveSearch $liveSearch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LiveSearch  $liveSearch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LiveSearch $liveSearch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LiveSearch  $liveSearch
     * @return \Illuminate\Http\Response
     */
    public function destroy(LiveSearch $liveSearch)
    {
        //
    }
}
