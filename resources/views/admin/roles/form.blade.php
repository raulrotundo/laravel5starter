
 @if (isset($action))
    {!! Form::model($role, ['route' => [$action, $role->id ], 'method'=>'PUT']) !!}
@else
    {!! Form::open(['route' => 'admin.roles.store']) !!}
@endif 
	<div class="box-body">
		<div class="form-group">
			{!! Form::label('role_title', 'Role:', ['class' => 'control-label']) !!}
			{!! Form::text('role_title', null, ['class' => 'form-control','placeholder' => 'Enter Title']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('role_slug', 'Slug:', ['class' => 'control-label']) !!}
			{!! Form::text('role_slug', null, ['class' => 'form-control','placeholder' => 'Enter Slug']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
			{!! Form::text('description', null, ['class' => 'form-control','placeholder' => 'Enter Description']) !!}
		</div>
	</div>
	<div class="box-footer">
		{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
	</div>
{!! Form::close() !!}
@section('javascript')
    <script src="{{ asset ("public/assets/admin/js/roles.js") }}"></script>
@endsection