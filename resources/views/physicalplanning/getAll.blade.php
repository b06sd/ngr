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
                <div class="modal-content animated bounceInRight">
                <form action="{{ route('physical-planning.store') }}">
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
                                <input type="text" placeholder="Enter the File Number" name="file_no" class="form-control">   
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
                </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>                    
                </div>
            </div>
        </div>
        <!-- Modal to display all information for selected row --> 
        <div class="modal inmodal" id="planningModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>File Number</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Fullname</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Location of development</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Type of development</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Count of structure</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Floor count</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Clearance</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Date sent out</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Assessment</td>
                                    <td></td>
                                </tr> 
                                <tr>
                                    <td>Assessment Type</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Amount paid</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Receipt number</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Date of payment</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Process in Date</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Process out Date</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Remark</td>
                                    <td></td>
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
@endpush  
@endsection