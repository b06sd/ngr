<?php

namespace App\Http\Controllers;

use File;
use App\Horc;
use DataTables;
use App\Exports\HorcExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


class HorcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('horcs.index');
    }

    public function fileImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        $file = file($request->file->getRealPath());
        $data = array_slice($file, 1);
        
        $parts = (array_chunk($data, 3000));
        foreach($parts as $index => $part){
            $fileName = resource_path('pending-files/horc/'.date('y-m-d-H-i-s').$index.'.csv');
            file_put_contents($fileName, $part);
        }
        (new Horc())->importToDb();
        session()->flash('status', 'queued for importing');
        return redirect('/horcs');
    }  
    
    public function fileExport() 
    {
        return Excel::download(new HorcExport, 'horc_template.csv');
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
     * @param  \App\Horc  $horc
     * @return \Illuminate\Http\Response
     */
    public function show(Horc $horc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horc  $horc
     * @return \Illuminate\Http\Response
     */
    public function edit(Horc $horc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horc  $horc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horc $horc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horc  $horc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horc $horc)
    {
        //
    }
}
