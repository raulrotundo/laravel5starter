
 @if (isset($action))
    {!! Form::model($permission_role, ['route' => [$action, $permission_role->id ], 'method'=>'PUT']) !!}
@else
    {!! Form::open(['route' => 'admin.permissionroles.store']) !!}
@endif 
	<div class="box-body">
		<div class="form-group">
			{!! Form::label('role_id', 'Role:', ['class' => 'control-label']) !!}
			{!! Form::text('role_id', null, ['class' => 'form-control','placeholder' => 'Enter Role']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('permission_id', 'Permission:', ['class' => 'control-label']) !!}
			{!! Form::text('permission_id', null, ['class' => 'form-control','placeholder' => 'Enter Permission']) !!}
		</div>
	</div>
	<div class="box-footer">
		{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
	</div>
{!! Form::close() !!}
@section('javascript')
    <script src="{{ asset ("public/assets/admin/js/table.grid.js") }}"></script>
@endsection