@extends('emails.layouts.master')
@section('title', trans('passwords.reset_title'))
@section('content')
	{{ trans('passwords.reset_email') }} <a href="{{ url('/password/reset/'.$token) }}">{{ url('/password/reset/'.$token) }}</a>
@endsection