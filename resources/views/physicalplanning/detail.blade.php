@extends('layouts.dashboard')
@section('title', 'Physical Planning Detail')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">
        <div class="col-md-3">
            <h2>Lands</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Information of {{ $planningById->file_no }}</strong>
                </li>
            </ol>
        </div>

    </div>
    <br>
    <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Details</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <br>
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
                                        <td id="payers">{{ $planningById->payer_id }}</td>
                                    </tr>
                                    <tr>
                                        <td>File Number</td>
                                        <td id="sp_fileno">{{ $planningById->file_no }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fullname</td>
                                        <td id="sp_name">{{ $planningById->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td id="sp_address">{{ $planningById->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Location of development</td>
                                        <td id="sp_dev_location">{{ $planningById->dev_location }}</td>
                                    </tr>
                                    <tr>
                                        <td>Type of development</td>
                                        <td id="sp_dev_type">{{ $planningById->development_type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Count of structure</td>
                                        <td id="sp_struct_count">{{ $planningById->structure_count }}</td>
                                    </tr>
                                    <tr>
                                        <td>Floor count</td>
                                        <td id="sp_floor_count">{{ $planningById->floor_count }}</td>
                                    </tr>
                                    <tr>
                                        <td>Clearance</td>
                                        <td id="sp_clearance">{{ $planningById->clearance }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date sent out</td>
                                        <td id="sp_date_sent_out">{{ $planningById->date_sent_out }}</td>
                                    </tr>
                                    <tr>
                                        <td>Assessment</td>
                                        <td id="sp_assessment">{{ $planningById->assessment }}</td>
                                    </tr>
                                    <tr>
                                        <td>Assessment Type</td>
                                        <td id="sp_assessment_type">{{ $planningById->assessment_type }}</td>
                                    </tr>
                                    <tr>
                                        <td>Amount paid</td>
                                        <td id="sp_amount_paid">{{ $planningById->amount_paid }}</td>
                                    </tr>
                                    <tr>
                                        <td>Receipt number</td>
                                        <td id="sp_receipt_number">{{ $planningById->receipt_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of payment</td>
                                        <td id="sp_date_paid">{{ $planningById->date_paid }}</td>
                                    </tr>
                                    <tr>
                                        <td>Process in Date</td>
                                        <td id="sp_process_in_date">{{ $planningById->process_in_date }}</td>
                                    </tr>
                                    <tr>
                                        <td>Process out Date</td>
                                        <td id="sp_process_out_date">{{ $planningById->process_out_date }}</td>
                                    </tr>
                                    <tr>
                                        <td>Remark</td>
                                        <td id="sp_remarks">{{ $planningById->remarks }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
@endsection
