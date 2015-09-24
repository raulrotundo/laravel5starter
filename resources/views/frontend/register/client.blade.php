@extends('frontend.layouts.master')	

@section('title', 'Register as Client')

@section('content')
<section id="register_client">
	<div class="container">
		<div class="row text-center">
			<h1>Create a Free Client Account</h1>
		</div>
		{!! Form::open(['url' => 'register/registration']) !!}
		<input type="hidden" name="role" value="client">
		<div class="row">
			@if(Session::has('socialdata'))
				<?php 
					$socialdata = Session::get('socialdata'); 
					$provider 	= ucfirst(Session::get('provider'));
					Session::flash('socialdata', $socialdata);
				?>
			@endif
			<div class="col-md-6">
				<div class="form-group">
					<input type="text" class="form-control" name="name" id="name" value="<?php if (Session::has('socialdata')) echo $socialdata->name; ?>" placeholder="{{ trans('register.name') }}" required="" data-validation-required-message="Please enter your {{ trans('register.name') }}." <?php if (Session::has('socialdata')) echo 'disabled' ?>>
					<p class="help-block text-danger"></p>
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="email" id="email" value="<?php if (Session::has('socialdata')) echo $socialdata->email; ?>" placeholder="{{ trans('register.email') }}" required="" data-validation-required-message="Please enter your {{ trans('register.email') }}." <?php if (Session::has('socialdata')) echo 'disabled' ?>>
					<p class="help-block text-danger"></p>
				</div>
				@if(Session::has('socialdata'))
					<p>Your {!!  $provider !!} account has been linked!</p>
					{!!  $socialdata->name !!}
					<img src="{!!  $socialdata->avatar !!}">
					<button type="button" class="btn btn-m" id="socialdata_edit">Edit</button>

				@endif
				<div class="form-group">
					<input type="password" class="form-control" name="password" id="password" placeholder="{{ trans('register.password') }}" required="" data-validation-required-message="Please enter your {{ trans('register.password') }}.">
					<p class="help-block text-danger"></p>
				</div>
				<div class="form-group">
					<input type="passsword" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="{{ trans('register.confirm_password') }}" required="" data-validation-required-message="Please enter your {{ trans('register.confirm_password') }}.">
					<p class="help-block text-danger"></p>
				</div>
				<div class="form-group">
					<select name='country_id' class="form-control select2 select2-hidden-accessible">
						<option value="" selected="selected">Select your Country</option> 
						@foreach($countries as $country)
							<option value="{!! $country->id !!}">{!! $country->name !!}</option>
						@endforeach
					</select>
					<p class="help-block text-danger"></p>
				</div>
				<div class="form-group">
					<div class="checkbox icheck">
						<label>
							<input type="checkbox"> I agree to the <a href="#">terms</a>
						</label>
					</div>
					{!! Form::submit('Register', array('class' => 'btn btn-xl')) !!}
				</div>
			</div>
			<div class="col-md-4">
				<div class="row text-center">
					<p>You can also sign up with: </p>
					<ul class="list-inline social-buttons">
						<li>
							<a href="{!! url('login/facebook') !!}" data-popup="true"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="{!! url('login/google') !!}" data-popup="true"><i class="fa fa-google"></i></a>
						</li>
					</ul>
				</div>								
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</section>
@endsection
@section('javascript')
    <script src="{{ asset ("public/assets/frontend/js/register.js") }}"></script>
@endsection