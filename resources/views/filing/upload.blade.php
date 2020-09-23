@extends('layouts.dashboard')

@section('content')
<div class="row  border-bottom white-bg dashboard-header">

    <div class="col-md-3">
        <h2>File upload</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/">Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>File upload</strong>
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
                    The file input feature by Bootstrap and Jasny allows you to create a visually appealing file or image input widgets based on the Bootstrap style. Additional dropzone.js library gives you drag’n’drop file uploads option.
                    <p></p>
                    <form>
                    <div class="custom-file">
                        <input id="logo" type="file" class="custom-file-input">
                        <label for="logo" class="custom-file-label selected"></label>
                    </div> 
                    <p></p>
                    <button class="btn btn-success " type="button"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Upload</span></button>
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
                    <a href="{{ route('filing.fileExport') }}"><i class="fa fa-download fa-3x" aria-hidden="true"></i> &nbsp;physical_planning_template.csv</a>
                    </div>
                </div>
            </div>
        </div>        
   
@endsection