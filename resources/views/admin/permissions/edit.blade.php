@extends('admin.layouts.master')
@section('title', trans('admin/permissions.title_page.update'))
@section('content')
	@include('admin.permissions.form')			
@endsection