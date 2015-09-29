
 @if (isset($action))
    {!! Form::model($permission, ['route' => [$action, $permission->id ], 'method'=>'PUT']) !!}
@else
    {!! Form::open(['route' => 'admin.permissions.store']) !!}
@endif 
	<div class="box-body">
		<div class="form-group">
			{!! Form::label('permission_title', 'Permission:', ['class' => 'control-label']) !!}
			{!! Form::text('permission_title', null, ['class' => 'form-control','placeholder' => 'Enter Title']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('permission_slug', 'Slug:', ['class' => 'control-label']) !!}
			{!! Form::text('permission_slug', null, ['class' => 'form-control','placeholder' => 'Enter Slug']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('permission_description', 'Description:', ['class' => 'control-label']) !!}
			{!! Form::text('permission_description', null, ['class' => 'form-control','placeholder' => 'Enter Description']) !!}
		</div>
	</div>
	<div class="box-footer">
		{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
	</div>
{!! Form::close() !!}
@section('javascript')
    <script src="{{ asset ("public/assets/admin/js/permissions.js") }}"></script>
    <script src="{{ asset ("public/assets/admin/js/table.grid.js") }}"></script>
@endsection