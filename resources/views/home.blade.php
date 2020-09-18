@extends('layouts.dashboard')

@section('content')
<div class="row  border-bottom white-bg dashboard-header">

<div class="col-md-3">
    <h2>{{Auth::user()->name}}</h2>
    <small>You have 42 messages and 6 notifications.</small>
</div>

</div>
@endsection
