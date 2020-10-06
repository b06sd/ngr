<?php

namespace App\Http\Controllers;

use File;
use App\Land;
use DataTables;
use Illuminate\Http\Request;
use App\Exports\LandExport;
use Maatwebsite\Excel\Facades\Excel;

class LandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lands.index');
    }

    public function getAllLands()
    {
        return view('lands.getAll');
    }
    
    public function getAllLandsData(Request $request)
    {
            $landdata = Land::all();
            return Datatables::of($landdata)
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPhysicalPlanning">Edit</a> ';    
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="btn btn-success btn-sm showPhysicalPlanning">Show</a>';
                        return $btn;
                    })
                    ->editColumn('id', '{{$id}}')
                    ->rawColumns(['action'])
                    ->make(true);     
    }  
    
    public function getLandDataById($id)
    {
        $landdatabyid = Land::findOrFail($id);
        return $landdatabyid;
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
            $fileName = resource_path('pending-files/lands/'.date('y-m-d-H-i-s').$index.'.csv');
            file_put_contents($fileName, $part);
        }
        (new Land())->importToDb();
        session()->flash('status', 'queued for importing');
        return redirect('/lands');
    }
    public function fileExport() 
    {
        return Excel::download(new LandExport, 'land_template.csv');
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
     * @param  \App\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function show(Land $land)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function edit(Land $land)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Land $land)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function destroy(Land $land)
    {
        //
    }
}
