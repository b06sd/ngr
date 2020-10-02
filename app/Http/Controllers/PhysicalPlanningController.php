<?php

namespace App\Http\Controllers;

use File;
use DataTables;
use App\PhysicalPlanning;
use Illuminate\Http\Request;
use App\Exports\FilingExport;
use App\Imports\ImportFiling;
use Maatwebsite\Excel\Facades\Excel;

class PhysicalPlanningController extends Controller
{

    public function __contruct()
    {
        set_time_limit(8000000);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('physicalplanning.upload');
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
           $fileName = resource_path('pending-files/physical-planning/'.date('y-m-d-H-i-s').$index.'.csv');
           file_put_contents($fileName, $part);
       }
       (new PhysicalPlanning())->importToDb();
       session()->flash('status', 'queued for importing');
       return redirect('/physical-planning');
    }  
    
    public function getAllPhysicalPlanning()
    {
        return view('physicalplanning.getAll');
    }
    
    public function getAllPhysicalPlanningData(Request $request)
    {
            $physicalplanningdata = PhysicalPlanning::all();
            return Datatables::of($physicalplanningdata)
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPhysicalPlanning">Edit</a>';    
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Show" class="btn btn-success btn-sm showPhysicalPlanning">Show</a>';
                        return $btn;
                    })
                    ->editColumn('id', '{{$id}}')
                    ->rawColumns(['action'])
                    ->make(true);     
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
        PhysicalPlanning::updateOrCreate(['id' => $request->physical_planning_id],
                ['name' => $request->name, 
                'detail' => $request->detail
                ]);        
   
        return response()->json(['success'=>'Physical Planning Profile saved successfully.']);
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
    public function edit($id)
    {
        $physicalplanning = PhysicalPlanning::find($id);
        return response()->json($physicalplanning);
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
