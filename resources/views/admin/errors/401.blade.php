@extends('admin.layouts.master')
@section('title', 'Dashboard')
@section('content')
<div class="error-page">
    <h2 class="headline text-yellow">401</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> HTTP Error 401.</h3>
        <p>Unauthorized: Access is denied due to invalid credentials.</p>
        <p><a href="{!! url('admin') !!}">Return to Home.</a></p>
    </div>
</div>
@endsection