@extends('layouts.dashboard')
@section('title', 'Horc List')

@section('content')
<div class="row  border-bottom white-bg dashboard-header">
    <div class="col-md-3">
        <h2>HORC</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Get All Entry for Horc</strong>
            </li>
        </ol>
    </div>

    </div>
    <br/>
<div class="col-md-12">
    <div class="ibox">
        <div class="ibox-title">
            HORC List
        </div>
        <div class="ibox-content">
            <span class="wrapper pull-right">
                <button class="btn btn-primary" data-toggle="modal" data-target="#createHorcModal">Add New Entry</button>
            </span>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dt-lands nowrap" style="width:100%" >
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Payer ID</th>
                            <th>Business Name</th>
                            <th>Business Address</th>
                            <th>Nature</th>
                            <th>Ownership</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>File Number</th>
                            <th>HORC Number</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                </table>
        </div>
            <!-- Modal for creating single record -->
            <div class="modal inmodal" id="createHorcModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight" >
                        <form action="{{ route('horcs.store') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <i class="fa fa-laptop modal-icon"></i>
                                <h4 class="modal-title">Individual Details</h4>
                                <small class="font-bold">Create individual information.</small>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Payer ID</label>
                                    <input type="text" placeholder="Enter the Payer ID" name="payer_id" class="form-control">
                                    <br>
                                    <label>Business Name</label>
                                    <input type="text" placeholder="Enter the Business Name" name="business_name" class="form-control">
                                    <br>
                                    <label>Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                                    <br>
                                    <label>Nature</label>
                                    <input type="text" placeholder="Nature" name="nature" class="form-control">
                                    <br>
                                    <label>Ownership</label>
                                    <input type="text" placeholder="Ownership" name="ownership" class="form-control">
                                    <br>
                                    <label>Contact Number</label>
                                    <input type="text" placeholder="Contact Number" name="contact_number" class="form-control">
                                    <br>
                                    <label>Email</label>
                                    <input type="text" placeholder="Email" name="email" class="form-control">
                                    <br>
                                    <label>Owners Address</label>
                                    <input type="text" placeholder="Owners Address" name="owners_address" class="form-control">
                                    <br>
                                    <label>Registration Date</label>
                                    <input type="date" placeholder="Registration Date" name="registration_date" class="form-control">
                                    <br>
                                    <label>File Number</label>
                                    <input type="text" placeholder="File Number" name="file_no" class="form-control">
                                    <br>
                                    <label>Horc Number</label>
                                    <input type="text" placeholder="horc_no" name="horc_no" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal for editing single record -->
            <div class="modal inmodal" id="editHorcModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight" >
                        <form action="{{ route('horcs.store') }}" method="POST">
                            <input type="hidden" name="id" id="id">
                            @csrf
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <i class="fa fa-laptop modal-icon"></i>
                                <h4 class="modal-title" id="horcCrudModal"></h4>
                                <small class="font-bold">Edit individual information.</small>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Payer ID</label>
                                    <input type="text" placeholder="Enter the Payer ID" name="payer_id" id="payer_id" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Business Name</label>
                                    <input type="text" placeholder="Enter the Business Name" name="business_name" id="business_name" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Address</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Address" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Nature</label>
                                    <input type="text" placeholder="Nature" name="nature" id="nature" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Ownership</label>
                                    <input type="text" placeholder="Ownership" name="ownership" id="ownership" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Contact Number</label>
                                    <input type="text" placeholder="Contact Number" name="contact_number" id="contact_number" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Email</label>
                                    <input type="text" placeholder="Email" name="email" id="email" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Owners Address</label>
                                    <input type="text" placeholder="Owners Address" name="owners_address" id="owners_address" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Registration Date</label>
                                    <input type="date" placeholder="Registration Date" name="registration_date" id="registration_date" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>File Number</label>
                                    <input type="text" placeholder="File Number" name="file_no" id="file_no" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Horc Number</label>
                                    <input type="text" placeholder="horc_no" name="horc_no" id="horc_no" class="form-control" onchange="validate()" onkeypress="validate()">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </div>
</div>
@push('dt-horc')
<script>
$('.dt-lands').DataTable({
    processing: true,
    serverSide: true,
    ajax: 'http://localhost:8000/getAllHorcsData',
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    columns: [
        {data: 'id', name: 'id'},
        {data: 'payer_id', name: 'payer_id'},
        {data: 'business_name', name: 'business_name'},
        {data: 'address', name: 'address'},
        {data: 'nature', name: 'nature'},
        {data: 'ownership', name: 'ownership'},
        {data: 'contact_number', name: 'contact_number'},
        {data: 'email', name: 'email'},
        {data: 'file_no', name: 'file_no'},
        {data: 'horc_no', name: 'horc_no'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
});
</script>
<script>
    $(document).ready( function () {
        /* When click New lands button */
        $('#new-planning').click(function () {
            $('#btn-save').val("create-land");
            $('#customer').trigger("reset");
            $('#landCrudModal').html("Add New Land Record");
            $('#crudModal').modal('show');
        });

        /* Edit lands */
        $('body').on('click', '#edit-horc', function () {
            var id = $(this).data('id');
            $.get('horcs/'+id+'/edit', function (data) {
                $('#horcCrudModal').html("Edit HORC Record");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled',false);
                $('#editHorcModal').modal('show');
                $('#id').val(data.id);
                $('#payer_id').val(data.payer_id);
                $('#business_name').val(data.business_name);
                $('#address').val(data.address);
                $('#nature').val(data.nature);
                $('#ownership').val(data.ownership);
                $('#contact_number').val(data.contact_number);
                $('#email').val(data.email);
                $('#owners_address').val(data.owners_address);
                $('#registration_date').val(data.registration_date);
                $('#file_no').val(data.file_no);
                $('#horc_no').val(data.horc_no);
            })
        })
    })
</script>
@endpush
@endsection
