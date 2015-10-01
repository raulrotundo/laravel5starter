@extends('admin.layouts.access')

@section('title', 'Login')

@section('content')

<div class="register-box">
	<div class="register-logo">
		{!! link_to('/', $title = 'AdminLTE') !!}
	</div>
	<div class="register-box-body">
		<p class="login-box-msg">Sign in to start your session</p>
		@if(Session::has('socialdata'))
			<?php
				//Receive
				$socialdata = Session::get('socialdata'); 
				$provider 	= Session::get('provider');
				//and send it to the next request
				Session::flash('socialdata', $socialdata);
				Session::flash('provider', $provider);
				$name 		= $socialdata->name;
				$email 		= $socialdata->email;
			?>
		@endif
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops! </strong> There were some problems with your input. <br> <br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }} </li>
				@endforeach
			</ul>
		</div>
		@endif
		{!! Form::open(['url' => 'register', 'id' => 'register_form']) !!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">			
			<div class="form-group has-feedback">
				{!! Form::text('name', isset($name) ? $name : old('name'), ['id'=>'name', 'required', isset($socialdata) ? 'readonly' : '', 'class'=>'form-control', 'placeholder'=>trans('register.name')]) !!}
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				{!! Form::text('email', isset($email) ? $email : old('email'), ['id'=>'email', 'required', isset($socialdata) ? 'readonly' : '', 'class'=>'form-control', 'placeholder'=>trans('register.email')]) !!}
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			@if(Session::has('socialdata'))
			<div class="form-group text-center">
				<h4>Your {!!  $provider !!} account has been linked!</h4>
				{!!  $socialdata->name !!}
				@if($socialdata->avatar)
				<img src="{!!  $socialdata->avatar !!}" class="avatar">
				@endif
				<button type="button" class="btn btn-primary btn-block btn-flat" id="socialdata_edit">Edit Personal Information</button>
			</div>
			@endif
			<div class="form-group has-feedback">
				{!! Form::password('password', ['id'=>'password', 'required', 'class'=>'form-control', 'placeholder'=>trans('register.password')]) !!}
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				{!! Form::password('password_confirmation', ['id'=>'password_confirmation', 'required', 'class'=>'form-control', 'placeholder'=>trans('register.confirm_password')]) !!}
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				{!! Form::select('country_id', $countries, old('country_id'), ['class'=>'form-control select2 select2-hidden-accessible']) !!}
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							{!! Form::checkbox('agree', 'check', false) !!}
							I agree to the <a href="#">terms</a>
						</label>
					</div>
				</div>
				<div class="col-xs-4">
					{!! Form::submit(trans('register.register_button'),['class'=>'btn btn-primary btn-block btn-flat']) !!}
				</div>
			</div>
		{!! Form::close() !!}
		<div class="social-auth-links text-center">
			<p>You can also register with:</p>
			<a href="{!! url('login/facebook') !!}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Facebook</a>
			<a href="{!! url('login/google') !!}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>Google</a>
		</div>
	</div>
</div>
@endsection
@section('javascript')
    <script src="{{ asset ("public/assets/admin/js/register.js") }}"></script>
@endsection