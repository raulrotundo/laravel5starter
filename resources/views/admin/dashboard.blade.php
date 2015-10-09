@extends('admin.layouts.master')
@section('title', trans('admin/dashboard.menu.dashboard'))
@section('content')
	{{ trans('admin/dashboard.welcome', ['user'=>$name]) }}
@endsection