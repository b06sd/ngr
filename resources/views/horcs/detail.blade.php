@extends('layouts.dashboard')
@section('title', 'Horc Detail')

@section('content')
    <div class="row  border-bottom white-bg dashboard-header">
        <div class="col-md-3">
            <h2>Lands</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Information of {{ $horc->file_no }}</strong>
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
                                            <td id="payers">{{ $horc->payer_id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Name of Business</td>
                                            <td id="sp_fileno">{{ $horc->business_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td id="sp_name">{{ $horc->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nature of Business</td>
                                            <td id="sp_address">{{ $horc->nature }}</td>
                                        </tr>
                                        <tr>
                                            <td>Owner</td>
                                            <td id="sp_dev_location">{{ $horc->ownership }}</td>
                                        </tr>
                                        <tr>
                                            <td>Contact Number</td>
                                            <td id="sp_dev_type">{{ $horc->contact_number }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email Address</td>
                                            <td id="sp_struct_count">{{ $horc->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Owners Address</td>
                                            <td id="sp_floor_count">{{ $horc->owners_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Registration Date</td>
                                            <td id="sp_clearance">{{ $horc->registration_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>File Number</td>
                                            <td id="sp_date_sent_out">{{ $horc->file_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>Horc Number</td>
                                            <td id="sp_assessment">{{ $horc->horc_no }}</td>
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
