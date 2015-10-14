@extends('admin.layouts.master')
@section('title', trans('admin/profile.title_page.update'))
@section('content')
	@include('admin.profile.form')
@endsection