@extends('layouts.dashboard')
@section('title', 'Physical Planning List')

@section('content')
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-md-3">
        <h2>Physical Planning</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Get All Physical Planning</strong>
            </li>
        </ol>
    </div>
    
    </div> 
    <br/>
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">
            Physical Planning List
        </div>
        <div class="ibox-content">
            <span class="wrapper pull-right">
                <button class="btn btn-primary">Add New Entry</button>
            </span>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dt-planning" >
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Payer ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Structure under Development</th>
                            <th>Clearance</th>
                            <th>Amount Paid</th>
                            <th>Receipt Number</th>
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
$('.dt-planning').DataTable({
    processing: true,
    serverSide: true,
    ajax: 'http://localhost:8000/getAllPlanningData',
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],    
    columns: [
        {data: 'id', name: 'id'},
        {data: 'payer_id', name: 'payer_id'},
        {data: 'name', name: 'name'},
        {data: 'address', name: 'address'},
        {data: 'dev_location', name: 'dev_location'},
        {data: 'clearance', name: 'clearance'},
        {data: 'amount_paid', name: 'amount_paid'},
        {data: 'receipt_number', name: 'receipt_number'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
});    
</script>
@endpush  
@endsection