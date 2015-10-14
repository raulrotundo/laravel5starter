
 @if (isset($action))
    {!! Form::model($user, ['route' => [$action, $user->id ], 'method'=>'PUT', 'files'=>true]) !!}
@else
    {!! Form::open(['route' => 'admin.profile.store', 'files'=>true, 'autocomplete' => 'false']) !!}
@endif 
	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('name', trans('admin/users.form.name.title'), ['class' => 'control-label']) !!}
					{!! Form::text('name', null, ['class' => 'form-control','placeholder' => trans('admin/users.form.name.placeholder')]) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('email', trans('admin/users.form.email.title'), ['class' => 'control-label']) !!}
					{!! Form::email('email', null, ['class' => 'form-control','placeholder' => trans('admin/users.form.email.placeholder')]) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('phone', trans('admin/users.form.phone.title'), ['class' => 'control-label']) !!}
					{!! Form::text('phone', null, ['class' => 'form-control','placeholder' => trans('admin/users.form.phone.placeholder')]) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('zipcode', trans('admin/users.form.zipcode.title'), ['class' => 'control-label']) !!}
					{!! Form::text('zipcode', null, ['class' => 'form-control','placeholder' => trans('admin/users.form.zipcode.placeholder')]) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('country_id', trans('admin/users.form.country.title'), ['class' => 'control-label']) !!}
					{!! Form::select('country_id', $countries, old('country_id'), ['class'=>'form-control select2 select2-hidden-accessible']) !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('city', trans('admin/users.form.city.title'), ['class' => 'control-label']) !!}
					{!! Form::text('city', null, ['class' => 'form-control','placeholder' => trans('admin/users.form.city.placeholder')]) !!}
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					{!! Form::label('address', trans('admin/users.form.address.title'), ['class' => 'control-label']) !!}
					{!! Form::text('address', null, ['class' => 'form-control','placeholder' => trans('admin/users.form.address.placeholder')]) !!}
				</div>
			</div>
		</div>
	</div>
	<div class="box-footer">
		{!! Form::submit(trans('admin/users.form.submit'), array('class' => 'btn btn-primary')) !!}
	</div>
{!! Form::close() !!}
@section('javascript')
    <script src="{{ asset ("public/assets/admin/js/common.js") }}"></script>
@endsection