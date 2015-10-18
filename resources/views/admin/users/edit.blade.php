@extends('admin.layouts.master')
@section('title', trans('admin/users.title_page.update'))
@section('content')
	@include('admin.users.form')
@endsection