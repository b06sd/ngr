@extends('layouts.dashboard')
@section('title', 'Live Search Database')

@section('content')
<div class="row  border-bottom white-bg dashboard-header">

    <div class="col-md-3">
        <h2>File Search</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Live search from Database</strong>
            </li>
        </ol>
    </div>
</div>

    <br/>
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Live Search</h5>
                </div>
                <div class="ibox-content">
                    Search all tables within the database
                    <p></p>
                    <form action="{{ route('livesearchs.search') }}" method="GET" name="livesearchform">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search tables" name="q"> 
                            <span class="input-group-append"> 
                                <button type="submit" class="btn btn-primary">Search!</button> 
                            </span>
                        </div>
                    <p></p>
                    </form>                  
                </div>
            </div>
        </div>   

        @if (isset($entries[0]))
        <div class="col-md-12">
            <div class="ibox-content">         

                <p> <h4>The Search results for your query in Lands table for <b style="text-transform: uppercase;"> {{ $q }} </b> are :</h4></p>
            <h2>Search result details</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Payer ID</th>
                            <th>Assignor</th>
                            <th>Nature of business</th>
                            <th>Location of property</th>
                            <th>Assignee</th>
                            <th>Value</th>
                            <th>File Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entries[0] as $item)
                        <tr>
                            <td>{{$item->payer_id}}</td>
                            <td>{{$item->assignor}}</td>
                            <td>{{$item->natOfBus}}</td>
                            <td>{{$item->propLocation}}</td>
                            <td>{{$item->assignee}}</td>
                            <td>{{$item->value}}</td>
                            <td>{{$item->fileNo}}</td>
                        </tr>                           
                        @endforeach
                    </tbody>
                </table>
            </div> 
        </div>              
        @endif

        @if (isset($entries[1]))
        <br><br>
        <div class="col-md-12">
            <div class="ibox-content">         

                <p> <h4>The Search results for your query in Physical Planning table for <b style="text-transform: uppercase;"> {{ $q }} </b> are :</h4></p>
            <h2>Search result details</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Payer ID</th>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Location of Development</th>
                        <th>Development Type</th>
                        <th>Clearance</th>
                        <th>Receipt Number</th>
                        <th>File Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entries[1] as $item)
                    <tr>
                        <td>{{$item->payer_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->dev_location}}</td>
                        <td>{{$item->development_type}}</td>
                        <td>{{$item->clearance}}</td>
                        <td>{{$item->receipt_number}}</td>
                        <td>{{$item->file_no}}</td>
                    </tr>                           
                    @endforeach
                </tbody>
            </table>

            </div> 
        </div>              
        @endif       

@endsection