
 @if (isset($action))
    {!! Form::model($user, ['route' => [$action, $user->id ], 'method'=>'PUT', 'files'=>true]) !!}
@else
    {!! Form::open(['route' => 'admin.users.store', 'files'=>true, 'autocomplete' => 'false']) !!}
@endif 
	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
					{!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Enter a Name']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('avatar', 'Avatar:', ['class' => 'control-label']) !!}
					{!! Form::file('avatar', ['class' => 'form-control', 'style' => '', 'id' => 'avatar_input']) !!}
					<br />
					<div class="text-center">
						@if ($user->avatar)
						<img src="{{$user->avatar}}" class="img-circle avatar_input">
						{!! Form::label('avatar_remove', 'Remove') !!}
						{!!Form::checkbox('avatar_remove', '1')!!}
						@else 
						<img src="{{asset(config('assets.images.paths.input')."/noavatar.jpg")}}" class="img-circle avatar_input">					
						@endif
					</div>					
				</div>								
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
					{!! Form::email('email', null, ['class' => 'form-control','placeholder' => 'Enter an Email']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('phone', 'Phone:', ['class' => 'control-label']) !!}
					{!! Form::text('phone', null, ['class' => 'form-control','placeholder' => 'Enter a Phone']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('city', 'City:', ['class' => 'control-label']) !!}
					{!! Form::text('city', null, ['class' => 'form-control','placeholder' => 'Enter a City']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
					{!! Form::password('password', ['class' => 'form-control','placeholder' => 'Enter a Password']) !!}
				</div>				
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('address', 'Address:', ['class' => 'control-label']) !!}
					{!! Form::text('address', null, ['class' => 'form-control','placeholder' => 'Enter an Address']) !!}
				</div>				
				<div class="form-group">
					{!! Form::label('country_id', 'Country:', ['class' => 'control-label']) !!}
					{!! Form::select('country_id', $countries, old('country_id'), ['class'=>'form-control select2 select2-hidden-accessible']) !!}
				</div>	
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('zipcode', 'Zipcode:', ['class' => 'control-label']) !!}
					{!! Form::text('zipcode', null, ['class' => 'form-control','placeholder' => 'Enter a Zipcode']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('active', 'Status:', ['class' => 'control-label']) !!}<br />
					{!! Form::checkbox('active', '1', null, ['class' => 'toggle_button']) !!}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="text-center"><h2 class="page-header">Assign Roles Section</h2></div>
			@foreach ($roles as $role)
			<div class="col-md-{{$col_md}} text-center">
				<div class ="small-box bg-aqua">
					<div class ="inner">
						<h3>{{ $role['role_title'] }}</h3>
						{!! Form::checkbox('roles[]', $role['id'], in_array($role['id'], $role_user), ['class' => 'toggle_button']) !!}
					</div>                
				</div>				
			</div>
			@endforeach
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
				</div>
			</div>
		</div>
	</div>
{!! Form::close() !!}
@section('javascript')
    <script src="{{ asset ("public/assets/admin/js/table.grid.js") }}"></script>
    <script src="{{ asset ("public/assets/admin/js/users.js") }}"></script>
@endsection