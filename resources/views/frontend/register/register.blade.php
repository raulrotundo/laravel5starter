
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('register.register_title') }}</div>
				<div class="panel-body">

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

					<form class="form-horizontal" role="form" method="POST" action="register">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('register.first_name') }}</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('register.last_name') }}</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
							</div>
						</div>

						<div class="form-control">{{ trans('register.email') }}</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('register.password') }}</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ trans('register.confirm_password') }}</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						@if(count($roles)>0)
							<select name='role_id'>
								<option value="" selected="selected">Select A Role</option> 
								@foreach($roles as $role)
									@if($role->id <> 1)
										<option value="{!! $role->id !!}">{!! $role->role_title !!}</option>
									@endif
								@endforeach
							</select>
						@endif

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">{{ trans('register.register_button') }}</button>                            
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>









@extends('admin.layouts.access')

@section('title', 'Login')

@section('content')

<div class="register-box">
	<div class="register-logo">
		<a href="../../index2.html"><b>Admin</b>LTE</a>
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">{{ trans('register.register_title') }}</p>
		{!! Form::open(['url' => 'login']) !!}
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="Full name">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="email" class="form-control" placeholder="Email">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Password">
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Retype password">
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
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
		<a href="/password/email">I forgot my password</a><br>
		<a href="register" class="text-center">Register a new membership</a>
	</div>
</div>

@endsection