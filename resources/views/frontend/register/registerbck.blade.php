@extends('admin.layouts.access')

@section('title', 'Login')

@section('content')

<div class="register-box">
	<div class="register-logo">
		<a href="../../index2.html"><b>Admin</b>LTE</a>
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">{{ trans('register.register_title') }}</p>
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach

			</ul>
		</div>
		@endif
		{!! Form::open(['url' => 'register']) !!}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="{{ trans('register.first_name') }}">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="{{ trans('register.last_name') }}">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ trans('register.email') }}">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="{{ trans('register.password') }}">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('register.confirm_password') }}">
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				@if(count($roles)>0)
					<select name='role_id' class="form-control select2 select2-hidden-accessible">
						<option value="" selected="selected">Select A Role</option> 
						@foreach($roles as $role)
							@if($role->id <> 1)
								<option value="{!! $role->id !!}">{!! $role->role_title !!}</option>
							@endif
						@endforeach
					</select>
				@endif
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox"> I agree to the <a href="#">terms</a>
						</label>
					</div>
				</div>
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
				</div>
			</div>
		{!! Form::close() !!}
		<div class="social-auth-links text-center">
			<p>Or Sign in as:</p>
			<div class="row">
				<div class="col-sm-6">
					<p>Client</p>					  		
					<a href="{!! url('login/facebook?role=client') !!}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Facebook</a>
					<a href="{!! url('login/google?role=client') !!}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>Google</a>
				</div>
				<div class="col-sm-6">
					<p>Company</p>
					<a href="{!! url('login/facebook?role=company') !!}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Facebook</a>
					<a href="{!! url('login/google?role=company') !!}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>Google</a>
				</div>
			</div>
		</div>
		<a href="{!! url('login') !!}" class="text-center">I already have a membership</a>
	</div>
</div>

@endsection