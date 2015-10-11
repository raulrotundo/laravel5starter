@extends('admin.layouts.master')
@section('title', trans('admin/roles.title_page.create'))
@section('content')
	@include('admin.roles.form')			
@endsection