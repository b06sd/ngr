<?php

namespace App\Http\Controllers;

use App\Filing;
use Illuminate\Http\Request;
use App\Exports\FilingExport;
use Maatwebsite\Excel\Facades\Excel;

class FilingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Filing::orderBy('id', 'desc')->get();
        return view('filing.upload', compact('data'));
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
     * @param  \App\Filing  $filing
     * @return \Illuminate\Http\Response
     */
    public function show(Filing $filing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Filing  $filing
     * @return \Illuminate\Http\Response
     */
    public function edit(Filing $filing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filing  $filing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filing $filing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filing  $filing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filing $filing)
    {
        //
    }

    public function fileExport() 
    {
        return Excel::download(new FilingExport, 'physical_planning_template.csv');
    } 
}
