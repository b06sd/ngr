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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPlanningModal">Add New Entry</button>
            </span>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dt-planning nowrap" style="width:100%" >
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Payer ID</th>
                            <th>Name</th>
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
                <!-- Modal for creating single record -->
                <div class="modal inmodal" id="createPlanningModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content animated bounceInRight" >
                            <form action="{{ route('physical-planning.store') }}" method="POST">
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
                                        <input type="text" required placeholder="Enter the File Number" name="file_no" class="form-control">
                                        <br>
                                        <label>Fullname</label>
                                        <input type="text" placeholder="Enter the Fullname" name="name" class="form-control">
                                        <br>
                                        <label>Address</label>
                                        <input type="text" placeholder="Enter the Address" name="address" class="form-control">
                                        <br>

                                        <label>Location of Development</label>
                                        <input type="text" placeholder="Enter development location area" name="dev_location" class="form-control">
                                        <br>
                                        <label>Development type</label>
                                        <input type="text" placeholder="Enter the development type" name="development_type" class="form-control">
                                        <br>
                                        <label>Structure Count</label>
                                        <input type="text" placeholder="Enter count of structure" name="structure_count" class="form-control">
                                        <br>
                                        <label>Floor Count</label>
                                        <input type="text" placeholder="Enter floor count" name="floor_count" class="form-control">
                                        <br>

                                        <label>Clearance</label>
                                        <input type="text" placeholder="Clearance" name="clearance" class="form-control">
                                        <br>
                                        <label>Date Sent Out</label>
                                        <input type="date" name="date_sent_out" class="form-control">
                                        <br>
                                        <label>Assessment</label>
                                        <input type="text" name="assessment" placeholder="Enter the Assessment value" class="form-control">
                                        <br>
                                        <label>Assessment Type</label>
                                        <input type="text" placeholder="Enter the Assessment type" name="assessment_type" class="form-control">
                                        <br>

                                        <label>Amount Paid</label>
                                        <input type="text" placeholder="Enter the amount type" name="amount_paid" class="form-control">
                                        <br>
                                        <label>Receipt Number</label>
                                        <input type="text" placeholder="Enter the Receipt Number" name="receipt_number" class="form-control">
                                        <br>
                                        <label>Date Paid</label>
                                        <input type="date" name="date_paid" class="form-control">
                                        <br>
                                        <label>Process In Date</label>
                                        <input type="date" class="form-control" name="process_in_date">
                                        <br>
                                        <label>Process Out Date</label>
                                        <input type="date" class="form-control" name="process_out_date">
                                        <br>
                                        <label for="remarks">Remarks</label>
                                        <input type="text" placeholder="Enter your remarks" name="remarks" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal to display all information for selected row -->




                <!-- Add and Edit planning modal -->
                <div class="modal fade" id="crud-modal" aria-hidden="true" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="planningCrudModal"></h4>
                            </div>
                            <div class="modal-body">
                                <form name="custForm" action="{{ route('physical-planning.store') }}" method="POST">
                                    <input type="hidden" name="id" id="id" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Payer ID:</strong>
                                                <input type="text" name="payer_id" id="payer_id" class="form-control" placeholder="Name" onchange="validate()" >
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Name:</strong>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" >
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>File NUmber:</strong>
                                                <input type="text" name="file_no" id="file_no" class="form-control" placeholder="File Number" onchange="validate()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Address:</strong>
                                                <input type="text" name="address" id="address" class="form-control" placeholder="Address" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Development Location:</strong>
                                                <input type="text" name="dev_location" id="dev_location" class="form-control" placeholder="Development Location" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Development Type:</strong>
                                                <input type="text" name="development_type" id="development_type" class="form-control" placeholder="Development Type" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Structure Count:</strong>
                                                <input type="text" name="structure_count" id="structure_count" class="form-control" placeholder="Structure Count" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Number of Floor:</strong>
                                                <input type="text" name="floor_count" id="floor_count" class="form-control" placeholder="Number of Floor" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Clearance:</strong>
                                                <input type="text" name="clearance" id="clearance" class="form-control" placeholder="Clearance" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Date Sent Out:</strong>
                                                <input type="text" name="date_sent_out" id="date_sent_out" class="form-control" placeholder="Date Sent Out" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Assessment:</strong>
                                                <input type="text" name="assessment" id="assessment" class="form-control" placeholder="Assessment" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Assessment Type:</strong>
                                                <input type="text" name="assessment_type" id="assessment_type" class="form-control" placeholder="Assessment Type" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Amount Paid:</strong>
                                                <input type="text" name="amount_paid" id="amount_paid" class="form-control" placeholder="Amount Paid" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Receipt Number:</strong>
                                                <input type="text" name="receipt_number" id="receipt_number" class="form-control" placeholder="Receipt Number" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Date Paid:</strong>
                                                <input type="text" name="date_paid" id="date_paid" class="form-control" placeholder="Date Paid" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Process In Date:</strong>
                                                <input type="text" name="process_in_date" id="process_in_date" class="form-control" placeholder="Process In Date" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Process Out date:</strong>
                                                <input type="text" name="process_out_date" id="process_out_date" class="form-control" placeholder="Process Out date" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Remarks:</strong>
                                                <input type="text" name="remarks" id="remarks" class="form-control" placeholder="Remarks" onchange="validate()" onkeypress="validate()">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
                                            <!--<a href="" class="btn btn-danger">Cancel</a>-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="modal inmodal" id="show-modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content animated bounceInRight">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <i class="fa fa-laptop modal-icon"></i>
                                <h4 class="modal-title">Individual Details</h4>
                                <small class="font-bold">Full individual information of data in the database.</small>
                            </div>
                            <div class="modal-body">

                                <table class="table table-striped table-bordered table-hover nowrap">
                                    <thead>
                                    <tr>
                                        <th style="width:30%">Fields</th>
                                        <th>Information</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Payer ID</td>
                                        <td id="payers"></td>
                                    </tr>
                                    <tr>
                                        <td>File Number</td>
                                        <td id="sp_fileno"></td>
                                    </tr>
                                    <tr>
                                        <td>Fullname</td>
                                        <td id="sp_name"></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td id="sp_address"></td>
                                    </tr>
                                    <tr>
                                        <td>Location of development</td>
                                        <td id="sp_dev_location"></td>
                                    </tr>
                                    <tr>
                                        <td>Type of development</td>
                                        <td id="sp_dev_type"></td>
                                    </tr>
                                    <tr>
                                        <td>Count of structure</td>
                                        <td id="sp_struct_count"></td>
                                    </tr>
                                    <tr>
                                        <td>Floor count</td>
                                        <td id="sp_floor_count"></td>
                                    </tr>
                                    <tr>
                                        <td>Clearance</td>
                                        <td id="sp_clearance"></td>
                                    </tr>
                                    <tr>
                                        <td>Date sent out</td>
                                        <td id="sp_date_sent_out"></td>
                                    </tr>
                                    <tr>
                                        <td>Assessment</td>
                                        <td id="sp_assessment"></td>
                                    </tr>
                                    <tr>
                                        <td>Assessment Type</td>
                                        <td id="sp_assessment_type"></td>
                                    </tr>
                                    <tr>
                                        <td>Amount paid</td>
                                        <td id="sp_amount_paid"></td>
                                    </tr>
                                    <tr>
                                        <td>Receipt number</td>
                                        <td id="sp_receipt_number"></td>
                                    </tr>
                                    <tr>
                                        <td>Date of payment</td>
                                        <td id="sp_date_paid"></td>
                                    </tr>
                                    <tr>
                                        <td>Process in Date</td>
                                        <td id="sp_process_in_date"></td>
                                    </tr>
                                    <tr>
                                        <td>Process out Date</td>
                                        <td id="sp_process_out_date"></td>
                                    </tr>
                                    <tr>
                                        <td>Remark</td>
                                        <td id="sp_remarks"></td>
                                    </tr>
                                    </tbody>
                                </table>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
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
                timeout:150000
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'payer_id', name: 'payer_id'},
                    {data: 'name', name: 'name'},
                    {data: 'dev_location', name: 'dev_location'},
                    {data: 'clearance', name: 'clearance'},
                    {data: 'amount_paid', name: 'amount_paid'},
                    {data: 'receipt_number', name: 'receipt_number'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
            });
        </script>
        <script>
            $(document).ready(function () {

                /* When click New customer button */
                $('#new-planning').click(function () {
                    $('#btn-save').val("create-planning");
                    $('#customer').trigger("reset");
                    $('#planningCrudModal').html("Add New Physical Planning Record");
                    $('#crud-modal').modal('show');
                });

                /* Edit Physical Planning */
                $('body').on('click', '#edit-planning', function () {
                    var id = $(this).data('id');
                    $.get('physicalPlanning/'+id+'/edit', function (data) {
                        $('#planningCrudModal').html("Edit Physical Planning Record");
                        $('#btn-update').val("Update");
                        $('#btn-save').prop('disabled',false);
                        $('#crud-modal').modal('show');
                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        $('#payer_id').val(data.payer_id);
                        $('#file_no').val(data.file_no);
                        $('#address').val(data.address);
                        $('#dev_location').val(data.dev_location);
                        $('#development_type').val(data.development_type);
                        $('#structure_count').val(data.structure_count);
                        $('#floor_count').val(data.floor_count);
                        $('#clearance').val(data.clearance);
                        $('#date_sent_out').val(data.date_sent_out);
                        $('#assessment').val(data.assessment);
                        $('#assessment_type').val(data.assessment_type);
                        $('#amount_paid').val(data.amount_paid);
                        $('#receipt_number').val(data.receipt_number);
                        $('#date_paid').val(data.date_paid);
                        $('#process_in_date').val(data.process_in_date);
                        $('#process_out_date').val(data.process_out_date);
                        $('#remarks').val(data.remarks);
                    })
                });


                /* Show Physical Planning */
                $('body').on('click', '#show-planning', function () {
                    var id = $(this).data('id');
                    $.get('/getById/'+id, function (data) {
                        $('#viewModal').html(data);
                        $('#show-modal').modal('show');
                        $('#sp_id').val(data.dataById.id);
                        $('#sp_name').val(data.dataById.name);
                        $('#payers').val(data.dataById.payer_id);
                        $('#sp_fileno').val(data.dataById.file_no);
                        $('#sp_address').val(data.dataById.address);
                        $('#sp_dev_location').val(data.dataById.dev_location);
                        $('#sp_dev_type').val(data.dataById.development_type);
                        $('#sp_struct_count').val(data.dataById.structure_count);
                        $('#sp_floor_count').val(data.dataById.floor_count);
                        $('#sp_clearance').val(data.dataById.clearance);
                        $('#sp_date_sent_out').val(data.dataById.date_sent_out);
                        $('#sp_assessment').val(data.dataById.assessment);
                        $('#sp_assessment_type').val(data.dataById.assessment_type);
                        $('#sp_amount_paid').val(data.dataById.amount_paid);
                        $('#sp_receipt_number').val(data.dataById.receipt_number);
                        $('#sp_date_paid').val(data.dataById.date_paid);
                        $('#sp_process_in_date').val(data.dataById.process_in_date);
                        $('#sp_process_out_date').val(data.dataById.process_out_date);
                        $('#sp_remarks').val(data.dataById.remarks);
                        console.log(data.dataById.address);
                    })
                });

                /* Show customer
                $('body').on('click', '#show-customer', function () {
                $('#customerCrudModal-show').html("Customer Details");
                $('#crud-modal-show').modal('show');
                });
                */
                /* Delete customer */
                $('body').on('click', '#delete-customer', function () {
                    var customer_id = $(this).data("id");
                    var token = $("meta[name='csrf-token']").attr("content");
                    confirm("Are You sure want to delete !");

                    $.ajax({
                        type: "DELETE",
                        url: "http://localhost/get-all-planning/"+id,
                        data: {
                            "id": customer_id,
                            "_token": token,
                        },
                        success: function (data) {
                            $('#msg').html('Customer entry deleted successfully');
                            $("#customer_id_" + id).remove();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                });
            });

        </script>
    @endpush
@endsection
