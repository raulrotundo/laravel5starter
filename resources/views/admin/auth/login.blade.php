@extends('admin.layouts.access')

@section('title', trans('login.signin_title'))

@section('content')

<div class="login-box">
	<div class="login-logo">
		{!! link_to('/', $title = 'AdminLTE') !!}
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">{{ trans('login.signin_title') }}</p>
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			{{ trans('login.msg_errors') }}
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }} </li>
				@endforeach
			</ul>
		</div>
		@endif
		@if (Session::get('registration-success'))
		 <div class="alert alert-success">
		   {{ Session::get('registration-success') }}
		</div>
		@endif
		{!! Form::open(['url' => 'login']) !!}
			{!! csrf_field() !!}
			<div class="form-group has-feedback">
				{!! Form::text('email', old('email'), ['id'=>'email', 'required', 'class'=>'form-control', 'placeholder'=>trans('login.email')]) !!}
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				{!! Form::password('password', ['id'=>'password', 'required', 'class'=>'form-control', 'placeholder'=>trans('login.password')]) !!}
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>							
							{!! Form::checkbox('remember', 'check', false) !!} {{ trans('login.remember_me') }}
						</label>
					</div>
				</div>
				<div class="col-xs-4">
					{!! Form::submit(trans('login.login_button'),['class'=>'btn btn-primary btn-block btn-flat']) !!}
				</div>
			</div>
		{!! Form::close() !!}
		{!! link_to('password/email', $title = trans('login.forgot_password')) !!}<br>
		{!! link_to('register', $title = trans('login.register_link')) !!}
	</div>
</div>

@endsection