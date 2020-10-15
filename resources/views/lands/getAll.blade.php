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
                <button class="btn btn-primary" data-toggle="modal" data-target="#createLandModal">Add New Entry</button>
            </span>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dt-lands nowrap" style="width:100%" >
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
        <!-- Modal for creating single record -->
            <div class="modal inmodal" id="createLandModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight" >
                        <form action="{{ route('lands.store') }}" method="POST">
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
                                    <label>File Number</label>
                                    <input type="text" placeholder="Enter the File Number" name="fileNo" class="form-control">
                                    <br>
                                    <label>Date</label>
                                    <input type="date" name="date" id="date" class="form-control" placeholder="Date">
                                    <br>
                                    <label>Column One</label>
                                    <input type="text" placeholder="Enter Column" name="column1" class="form-control">
                                    <br>
                                    <label>Nature of Business</label>
                                    <input type="text" placeholder="Nature of Business" name="natOfBus" class="form-control">
                                    <br>
                                    <label>Location of Property</label>
                                    <input type="text" placeholder="Location of property" name="propLocation" class="form-control">
                                    <br>
                                    <label>Value</label>
                                    <input type="text" placeholder="Enter Value" name="value" class="form-control">
                                    <br>
                                    <label>Assignor</label>
                                    <input type="text" placeholder="Enter Assignor" name="assignor" class="form-control">
                                    <br>
                                    <label>Column Two</label>
                                    <input type="text" placeholder="Column Two" name="column2" class="form-control">
                                    <br>
                                    <label>Address One</label>
                                    <input type="text" placeholder="Enter Address One" name="address1" class="form-control">
                                    <br>
                                    <label>Assignee</label>
                                    <input type="text" placeholder="Assignee" name="assignee" class="form-control">
                                    <br>
                                    <label>Column Three</label>
                                    <input type="text" placeholder="Column Three" name="column3" class="form-control">
                                    <br>
                                    <label>Address Two</label>
                                    <input type="text" placeholder="Address Two" name="address2" class="form-control">
                                    <br>
                                    <label>Capital Gain Tax</label>
                                    <input type="text" placeholder="Capital Gain Tax" name="cgt" class="form-control">
                                    <br>
                                    <label>Assignor Payment</label>
                                    <input type="text" placeholder="Assignor Payment" name="assignorPay" class="form-control">
                                    <br>
                                    <label>Assignee Pay</label>
                                    <input type="text" placeholder="Assignee Payment" name="assigneePay" class="form-control">
                                    <br>
                                    <label>Borrowers</label>
                                    <input type="text" placeholder="Borrowers" name="borrowers" class="form-control">
                                    <br>
                                    <label>Stamp Duty</label>
                                    <input type="text" placeholder="Stamp Duty" name="stampDuty" class="form-control">
                                    <br>
                                    <label>Premises</label>
                                    <input type="text" placeholder="Premises" name="premises" class="form-control">
                                    <br>
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


        <!-- Add and Edit planning modal -->
            <div class="modal inmodal" id="crudModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content animated bounceInRight" >
                        <form action="{{ route('lands.store') }}" method="POST">
                            <input type="hidden" name="id" id="id">
                            @csrf
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <i class="fa fa-laptop modal-icon"></i>
                                <h4 class="modal-title" id="landCrudModal"></h4>
                                <small class="font-bold">Edit individual information.</small>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Payer ID</label>
                                    <input type="text" placeholder="Enter the Payer ID" name="payer_id" id="payer_id" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>File Number</label>
                                    <input type="text" placeholder="Enter the File Number" name="fileNo" id="fileNo" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Date</label>
                                    <input type="text" name="date" id="date" class="form-control" placeholder="Date" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Column One</label>
                                    <input type="text" placeholder="Enter Column" name="column1" id="column1" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Nature of Business</label>
                                    <input type="text" placeholder="Nature of Business" name="natOfBus" id="natOfBus" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Location of Property</label>
                                    <input type="text" placeholder="Location of property" name="propLocation" id="propLocation" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Value</label>
                                    <input type="text" placeholder="Enter Value" name="value" id="value" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Assignor</label>
                                    <input type="text" placeholder="Enter Assignor" name="assignor" id="assignor" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Column Two</label>
                                    <input type="text" placeholder="Column Two" name="column2" id="column2" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Address One</label>
                                    <input type="text" placeholder="Enter Address One" name="address1" id="address1" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Assignee</label>
                                    <input type="text" placeholder="Assignee" name="assignee" id="assignee" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Column Three</label>
                                    <input type="text" placeholder="Column Three" name="column3" id="column3" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Address Two</label>
                                    <input type="text" placeholder="Address Two" name="address2" id="address2" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Capital Gain Tax</label>
                                    <input type="text" placeholder="Capital Gain Tax" name="cgt" id="cgt" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Assignor Payment</label>
                                    <input type="text" placeholder="Assignor Payment" name="assignorPay" id="assignorPay" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Assignee Pay</label>
                                    <input type="text" placeholder="Assignee Payment" name="assigneePay" id="assigneePay" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Borrowers</label>
                                    <input type="text" placeholder="Borrowers" name="borrowers" id="borrowers" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Stamp Duty</label>
                                    <input type="text" placeholder="Stamp Duty" name="stampDuty" id="stampDuty" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
                                    <label>Premises</label>
                                    <input type="text" placeholder="Premises" name="premises" id="premises" class="form-control" onchange="validate()" onkeypress="validate()">
                                    <br>
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
        $('body').on('click', '#edit-land', function () {
            var id = $(this).data('id');
            $.get('land/'+id+'/edit', function (data) {
                $('#landCrudModal').html("Edit Lands Record");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled',false);
                $('#crudModal').modal('show');
                $('#id').val(data.id);
                $('#payer_id').val(data.payer_id);
                $('#fileNo').val(data.fileNo);
                $('#Date').val(data.Date);
                $('#column1').val(data.column1);
                $('#natOfBus').val(data.natOfBus);
                $('#propLocation').val(data.propLocation);
                $('#value').val(data.value);
                $('#assignor').val(data.assignor);
                $('#column2').val(data.column2);
                $('#address1').val(data.address1);
                $('#assignee').val(data.assignee);
                $('#column3').val(data.column3);
                $('#address2').val(data.address2);
                $('#cgt').val(data.cgt);
                $('#assignorPay').val(data.assignorPay);
                $('#assigneePay').val(data.assigneePay);
                $('#borrowers').val(data.borrowers);
                $('#stampDuty').val(data.stampDuty);
                $('#premises').val(data.premises);
            })
        })
    })
</script>
@endpush
@endsection
