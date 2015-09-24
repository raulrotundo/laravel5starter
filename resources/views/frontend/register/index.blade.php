@extends('frontend.layouts.master')	

@section('content')

<div class="row m-lg-top m-xlg-bottom">
	<div class="col-md-12 m-lg-bottom">
		<hgroup class="text-center">
			<h1 class="m-xs-top-bottom">Let's get started!</h1>
			<h1 class="m-xs-top-bottom">Let's get started! First, tell us what you're looking for.</h1>
		</hgroup>
	</div>

	<div class="m-lg-bottom hidden-xs">&nbsp;</div>
	<div class="p-md-bottom visible-xs">&nbsp;</div>

	<div class="col-md-12 text-center">
		<div class="col-md-5">
			<p class="fs-sm m-lg-bottom">Quia dolor sit amet, consectetur, adipisci velit</p>
			<a class="btn btn-primary text-capitalize m-0" href="{!! url('register/client') !!}">Client</a>
		</div>
		<div class="col-md-2 o-or-divider">OR</div>
		<div class="col-md-5">
			<p class="fs-sm m-lg-bottom">Neque porro quisquam est qui dolorem ipsum</p>
			<a class="btn btn-primary text-capitalize m-0" href="{!! url('register/company') !!}">Company</a>
		</div>
	</div>
</div>
@endsection