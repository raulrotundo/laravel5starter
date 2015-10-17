@extends('emails.layouts.master')
@section('title', trans('register.email-registration-subject'))
@section('content')
    <p>Thanks for creating an account with the verification demo app.</p>
    <p>Please follow the link below to verify your email address
    {{ URL::to('register/verify/' . $activation_code) }}</p>
@endsection