<?php

namespace App\Http\Controllers;

use File;
use DataTables;
use App\PhysicalPlanning;
use Illuminate\Http\Request;
use App\Exports\FilingExport;
use App\Imports\ImportFiling;
use Maatwebsite\Excel\Facades\Excel;
use phpDocumentor\Reflection\Types\Array_;

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
        foreach ($parts as $index => $part) {
            $fileName = resource_path('pending-files/physical-planning/' . date('y-m-d-H-i-s') . $index . '.csv');
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

    public function getPhysicalPlanningById($details)
    {
        $dataById = PhysicalPlanning::findOrFail($details);
        return ["dataById" => $dataById];
    }

    public function getAllPhysicalPlanningData(Request $request)
    {
        $physicalplanningdata = PhysicalPlanning::all();
        return Datatables::of($physicalplanningdata)
            ->addColumn('action', function ($row) {
                $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm" id="edit-planning" data-toggle="modal" data-target="#crud-modal" data-id="' . $row->id . '">Edit </a>';
                $btn = $btn . ' <a href="'.route("physicalplanning.detail", $row->id).'" class="btn btn-success btn-sm" id="show-planning" data-id="' . $row->id . '">Show</a>';
                return $btn;
            })
            ->editColumn('id', '{{$id}}')
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
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
        if (empty($request->id))
            $msg = 'Planning entry created successfully.';
        else
            $msg = 'Planning data is updated successfully';

        return redirect('get-all-planning')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Filing $filing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planningById = PhysicalPlanning::findOrFail($id);
        return view('physicalplanning.detail', compact('planningById'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Filing $filing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $physicalplanning = PhysicalPlanning::find($id);
        return $physicalplanning;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Filing $filing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filing $filing)
    {
        $physicalplanning = PhysicalPlanning::find($id);
        return response()->json($physicalplanning);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Filing $filing
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
