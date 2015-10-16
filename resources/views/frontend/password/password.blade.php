@extends('admin.layouts.access')

@section('title', trans('passwords.reset_title'))

@section('content')

<div class="login-box">
	<div class="login-logo">
		{!! link_to('/', $title = 'AdminLTE') !!}
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">{{ trans('passwords.reset_title') }}</p>
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
		@if (Session::get('status'))
		 <div class="alert alert-success">
		   {{ Session::get('status') }}
		</div>
		@endif
		{!! Form::open(['url' => 'password/email']) !!}
			{!! csrf_field() !!}
			<div class="form-group has-feedback">
				{!! Form::text('email', old('email'), ['id'=>'email', '', 'class'=>'form-control', 'placeholder'=>trans('login.email')]) !!}
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				{!! app('captcha')->display(); !!}
			</div>
			<div class="form-group has-feedback">
				{!! Form::submit(trans('passwords.submit'),['class'=>'btn btn-primary btn-block btn-flat']) !!}
			</div>
		{!! Form::close() !!}
	</div>
</div>

@endsection