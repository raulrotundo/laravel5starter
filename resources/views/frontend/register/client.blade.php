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
					<div class="row text-center signup">
						<h4>You can also sign up with: </h4>
						<ul class="list-inline social-buttons">
							<li>
								<a href="{!! url('login/facebook') !!}"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="{!! url('login/google') !!}"><i class="fa fa-google"></i></a>
							</li>
						</ul>
					</div>
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
						@if(Session::has('socialdata'))
						<div class="form-group text-center">
							<h4>Your {!!  $provider !!} account has been linked!</h4>
							{!!  $socialdata->name !!}
							@if($socialdata->avatar)
							<img src="{!!  $socialdata->avatar !!}" class="avatar">
							@endif
							<button type="button" class="btn btn-m" id="socialdata_edit">Edit</button>
						</div>
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
								<option value="" selected="selected">{{ trans('register.select_country') }}</option> 
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