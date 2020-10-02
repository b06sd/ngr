@extends('layouts.dashboard')
@section('title', 'Lands List')

@section('content')
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-md-3">
        <h2>Lands</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Get All Entry for Lands</strong>
            </li>
        </ol>
    </div>
    
    </div> 
    <br/>
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">
            Land List
        </div>
        <div class="ibox-content">
            <span class="wrapper pull-right">
                <button class="btn btn-primary">Add New Entry</button>
            </span>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dt-lands" >
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Payer ID</th>
                            <th>File Number</th>
                            <th>Nature Of Business</th>
                            <th>Property Location</th>
                            <th>Value</th>
                            <th>Name of Assignor</th>
                            <th>Name of Assignee</th>
                            <th>Action</th>
                        </tr>
                        </thead>   
                        <tbody>
                        </tbody>                 
                </table>
        </div>
    </div>
    </div>
</div>  
@push('dt-planning')
<script>
$('.dt-lands').DataTable({
    processing: true,
    serverSide: true,
    ajax: 'http://localhost:8000/getAllLandsData',
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],    
    columns: [
        {data: 'id', name: 'id'},
        {data: 'payer_id', name: 'payer_id'},
        {data: 'fileNo', name: 'fileNo'},
        {data: 'natOfBus', name: 'natOfBus'},
        {data: 'propLocation', name: 'propLocation'},
        {data: 'value', name: 'value'},
        {data: 'assignor', name: 'assignor'},
        {data: 'assignee', name: 'assignee'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
});    
</script>
@endpush  
@endsection