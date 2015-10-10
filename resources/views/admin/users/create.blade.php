@extends('admin.layouts.master')
@section('title', trans('admin/users.title_page.create'))
@section('content')
	@include('admin.users.form')
@endsection