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

    public function getPhysicalPlanningById($id)
    {
        $dataById = PhysicalPlanning::findOrFail($id);
    }
    
    public function getAllPhysicalPlanningData(Request $request)
    {
            $physicalplanningdata = PhysicalPlanning::all();
            return Datatables::of($physicalplanningdata)
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPhysicalPlanning">Edit</a>';    
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="modal" data-target="#planningModal"  data-id="'.$row->id.'" data-original-title="Show" class="btn btn-success btn-sm showPhysicalPlanning">Show</a>';
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
        PhysicalPlanning::updateOrCreate(['id' => $request->id],
                [
         'payer_id' => $request->payer_id,
         'file_no' => $request->file_no,
         'name' => $request->name,
         'address' => $request->address,
         'dev_location' => $request->dev_location,
         'development_type' => $request->development_type,
         'structure_count' => $request->structure_count,
         'floor_count' => $request->floor_count,
         'clearance' => $request->clearance,
         'date_sent_out' => $request->date_sent_out,
         'assessment' => $request->assessment,
         'assessment_type' => $request->assessment_type,
         'amount_paid' => $request->amount_paid,
         'receipt_number' => $request->receipt_number,
         'date_paid' => $request->date_paid,
         'process_in_date' => $request->process_in_date,
         'process_out_date' => $request->process_out_date,
         'remarks' => $request->remarks,
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
