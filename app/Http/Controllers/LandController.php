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
                        $btn = '<a href="javascript:void(0)" data-toggle="modal" data-target="#crudModal" id="edit-land"  data-id="'.$row->id.'" class="btn btn-primary btn-sm">Edit</a> ';
                        $btn = $btn.' <a href="'.route("lands.detail", $row->id).'" data-id="'.$row->id.'" id="show-land" class="btn btn-success btn-sm">Show</a>';
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
        Land::updateOrCreate(['id' => $request->id],[
            'payer_id' => $request->payer_id,
            'fileNo' => $request->fileNo,
            'Date' => $request->Date,
            'column1' => $request->column1,
            'natOfBus' => $request->natOfBus,
            'propLocation' => $request->propLocation,
            'value' => $request->value,
            'assignor' => $request->assignor,
            'column2' => $request->column2,
            'address1' => $request->address1,
            'assignee' => $request->assignee,
            'column3' => $request->column3,
            'address2' => $request->address2,
            'cgt' => $request->cgt,
            'assignorPay' => $request->assignorPay,
            'assigneePay' => $request->assigneePay,
            'borrowers' => $request->borrowers,
            'stampDuty' => $request->stampDuty,
            'premises' => $request->premises,
        ]);
        if (empty($request->id))
            $msg = 'Land entry created successfully.';
        else
            $msg = 'Land entry updated successfully.';

        return redirect('get-all-lands')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $land = Land::findOrFail($id);
        return view('lands.detail', compact('land'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Land  $land
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $land = Land::findOrFail($id);
        return $land;
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
