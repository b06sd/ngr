@extends('layouts.dashboard')
@section('title', 'Lands Detail')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">
        <div class="col-md-3">
            <h2>Lands</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Information of {{ $land->fileNo }}</strong>
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
                                            <td id="payers">{{ $land->payer_id }}</td>
                                        </tr>
                                        <tr>
                                            <td>File Number</td>
                                            <td id="sp_fileno">{{ $land->fileNo }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td id="sp_name">{{ $land->Date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Column 1</td>
                                            <td id="sp_address">{{ $land->column1 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nature of Business</td>
                                            <td id="sp_dev_location">{{ $land->natOfBus }}</td>
                                        </tr>
                                        <tr>
                                            <td>Location of property</td>
                                            <td id="sp_dev_type">{{ $land->propLocation }}</td>
                                        </tr>
                                        <tr>
                                            <td>Value</td>
                                            <td id="sp_struct_count">{{ $land->value }}</td>
                                        </tr>
                                        <tr>
                                            <td>Assignor</td>
                                            <td id="sp_floor_count">{{ $land->assignor }}</td>
                                        </tr>
                                        <tr>
                                            <td>Column 2</td>
                                            <td id="sp_clearance">{{ $land->column2 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address 1</td>
                                            <td id="sp_date_sent_out">{{ $land->address1 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Assignee</td>
                                            <td id="sp_assessment">{{ $land->assignee }}</td>
                                        </tr>
                                        <tr>
                                            <td>Column 3</td>
                                            <td id="sp_assessment_type">{{ $land->column3 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address 2</td>
                                            <td id="sp_amount_paid">{{ $land->address2 }}</td>
                                        </tr>
                                        <tr>
                                            <td>Capital Gain Tax</td>
                                            <td id="sp_receipt_number">{{ $land->cgt }}</td>
                                        </tr>
                                        <tr>
                                            <td>Assignor payment</td>
                                            <td id="sp_date_paid">{{ $land->assignorPay }}</td>
                                        </tr>
                                        <tr>
                                            <td>Assignee Payment</td>
                                            <td id="sp_process_in_date">{{ $land->assigneePay }}</td>
                                        </tr>
                                        <tr>
                                            <td>Borrowers</td>
                                            <td id="sp_process_out_date">{{ $land->borrowers }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stamp Duty</td>
                                            <td id="sp_remarks">{{ $land->stampDuty }}</td>
                                        </tr>
                                        <tr>
                                            <td>Premises</td>
                                            <td id="sp_remarks">{{ $land->premises }}</td>
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
