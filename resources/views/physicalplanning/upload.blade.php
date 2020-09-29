@extends('layouts.dashboard')
@section('title', 'Physical Planning File Upload')

@section('content')
<div class="row  border-bottom white-bg dashboard-header">

    <div class="col-md-3">
        <h2>File upload</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>physical Planning File upload</strong>
            </li>
        </ol>
    </div>
    
    </div> 
    
    <br/>
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Physical Planning File Upload</h5>
                </div>
                <div class="ibox-content">
                    The file input feature is to allow for physical planning file upload.
                    <p></p>
                    <form action="{{ route('physical-planning.fileImport') }}" method="POST" name="importplanningform" enctype="multipart/form-data">
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
                    <h5>Physical Planning Sample File Download</h5>
                </div>
                <div class="ibox-content">
                    <div class="">
                        Download sample template for physical planning upload.
                        <br>
                        <br>
                    <a href="{{ route('physical-planning.fileExport') }}"><i class="fa fa-download fa-2x" aria-hidden="true"></i> &nbsp;physical_planning_template.csv</a>
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
