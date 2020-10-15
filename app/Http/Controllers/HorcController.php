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

    public function getAllHorcs()
    {
        return view('horcs.getAll');
    }

    public function getAllHorcsData(Request $request)
    {
            $horcdata = Horc::all();
            return Datatables::of($horcdata)
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="modal" id="edit-horc" data-target="#editHorcModal"  data-id="'.$row->id.'"  class="edit btn btn-primary btn-sm">Edit</a> ';
                        $btn = $btn.' <a href="'.route("horcs.detail", $row->id).'" id="show-horc" data-id="'.$row->id.'" class="btn btn-success btn-sm">Show</a>';
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
        Horc::updateOrCreate(['id' => $request->id], [
            'payer_id' => $request->payer_id,
            'business_name' => $request->business_name,
            'address' => $request->address,
            'nature' => $request->nature,
            'ownership' => $request->ownership,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'owners_address' => $request->owners_address,
            'registration_date' => $request->registration_date,
            'file_no' => $request->file_no,
            'horc_no' => $request->horc_no,
        ]);
        if (empty($request->id))
            $msg = 'Horc entry created successfully.';
        else
            $msg = 'Horc data is updated successfully';

        return redirect('get-all-horc')->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horc  $horc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horc = Horc::findOrFail($id);
        return view('horcs.detail', compact('horc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horc  $horc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Horc::findOrFail($id);
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
