@extends('frontend.layouts.master')	

@section('title', 'Register as Company')

@section('content')
<section id="register_company">
	<div class="container">
		<div class="row text-center">
			<h1>Create a Free Company Account</h1>
		</div>
		{!! Form::open(['url' => 'register/registration']) !!}
			<input type="hidden" name="role" value="company">
			<div class="row">
				<div class="container_form text-muted">
					@if(Session::has('socialdata'))
						<?php
							//Receive
							$socialdata = Session::get('socialdata'); 
							$provider 	= Session::get('provider');
							//and send it to the next request
							Session::flash('socialdata', $socialdata);
							Session::flash('provider', $provider);
						?>
					@endif			
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
					<fieldset>
						<legend>{{ trans('register.user_information_title') }}</legend>
						<div class="form-group">
							<input type="text" class="form-control" name="name" id="name" value="<?php if (Session::has('socialdata')) echo $socialdata->name; ?>" placeholder="{{ trans('register.name') }}" required="" data-validation-required-message="Please enter your {{ trans('register.name') }}." <?php if (Session::has('socialdata')) echo 'readonly="readonly"' ?>>
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email" value="<?php if (Session::has('socialdata')) echo $socialdata->email; ?>" placeholder="{{ trans('register.email') }}" required="" data-validation-required-message="Please enter your {{ trans('register.email') }}." <?php if (Session::has('socialdata')) echo 'readonly="readonly"' ?>>
							<p class="help-block text-danger"></p>
						</div>					
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
								<option value="" selected="selected">{{ trans('register.select_country') }}</option> 
								@foreach($countries as $country)
									<option value="{!! $country->id !!}">{!! $country->name !!}</option>
								@endforeach
							</select>
							<p class="help-block text-danger"></p>
						</div>
					</fieldset>
					<fieldset>
						<legend>{{ trans('register.company_information_title') }}</legend>
						<div class="form-group">
							<input type="text" class="form-control" name="company_name" id="company_name" placeholder="{{ trans('register.company_name') }}" required="" data-validation-required-message="Please enter your {{ trans('register.company_name') }}.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="company_address" id="company_address" placeholder="{{ trans('register.company_address') }}" required="" data-validation-required-message="Please enter your {{ trans('register.company_address') }}.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="company_phone" id="company_phone" placeholder="{{ trans('register.company_phone') }}" required="" data-validation-required-message="Please enter your {{ trans('register.company_phone') }}.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="company_zipcode" id="company_zipcode" placeholder="{{ trans('register.company_zipcode') }}" required="" data-validation-required-message="Please enter your {{ trans('register.company_zipcode') }}.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" name="company_email" id="company_email" placeholder="{{ trans('register.company_email') }}" required="" data-validation-required-message="Please enter your {{ trans('register.company_email') }}.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="company_website" id="company_website" placeholder="{{ trans('register.company_website') }}" required="" data-validation-required-message="Please enter your {{ trans('register.company_website') }}.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="company_city" id="company_city" placeholder="{{ trans('register.company_city') }}" required="" data-validation-required-message="Please enter your {{ trans('register.company_city') }}.">
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group">
							<select name='company_country_id' class="form-control select2 select2-hidden-accessible">
								<option value="" selected="selected">Select your Country</option> 
								@foreach($countries as $country)
									<option value="{!! $country->id !!}">{!! $country->name !!}</option>
								@endforeach
							</select>
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group text-center">
							<div class="checkbox icheck">
								<label>
									<input type="checkbox"> I agree to the <a href="#">terms</a>
								</label>
							</div>						
						</div>
					</fieldset>
					{!! Form::submit(trans('register.register_button'), array('class' => 'btn btn-xl')) !!}
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</section>
@endsection
@section('javascript')
    <script src="{{ asset ("public/assets/frontend/js/register.js") }}"></script>
@endsection