@extends('emails.layouts.master')
@section('title', trans('register.email-registration-subject'))
@section('content')
    <p>If you have changed your email,</p>
    <p>Please follow the link below to verify your email address 
    {{ URL::to('admin/profile/verify_email/' . $activation_code) }}</p>
@endsection