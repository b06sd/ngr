@extends('layouts.dashboard')
@section('title', 'Lands File Upload')

@section('content')
<div class="row  border-bottom white-bg dashboard-header">

    <div class="col-md-3">
        <h2>File upload</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Lands File upload</strong>
            </li>
        </ol>
    </div>
    
    </div> 
    
    <br/>
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Lands File Upload</h5>
                </div>
                <div class="ibox-content">
                    The file input feature is to allow for lands file upload.
                    <p></p>
                    <form action="{{ route('lands.fileImport') }}" method="POST" name="importlandsform" enctype="multipart/form-data">
                        @csrf
                    <div class="custom-file">
                        <input id="logo" type="file" class="custom-file-input" name="file" required>
                        <label for="logo" class="custom-file-label selected"></label>
                    </div> 
                    <p></p>
                    <button class="btn btn-success " type="submit" name="submit"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Upload</span></button>
                    </form>                  
                </div>
            </div>
        </div>

        <br/>
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Lands Sample File Download</h5>
                </div>
                <div class="ibox-content">
                    <div class="">
                        Download sample template for lands upload.
                        <br>
                        <br>
                    <a href="{{ route('lands.fileExport') }}"><i class="fa fa-download fa-2x" aria-hidden="true"></i> &nbsp;lands_template.csv</a>
                    </div>
                </div>
            </div>
        </div>        

        @push('upload')
        <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
         });     
        </script>
        @endpush        
@endsection
