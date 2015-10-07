
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

	<div class="row">
		<div class="text-center"><h2 class="page-header">Roles assignment's Section</h2></div>
    	<div class="col-xs-5">
    		{!! Form::select('roles_list[]', $list_roles, null, ['id' => 'search', 'class' => 'form-control', 'size' => '8', 'multiple' => 'multiple']) !!}
    	</div>
    	
    	<div class="col-xs-2">
    		<button type="button" id="search_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
    		<button type="button" id="search_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
    		<button type="button" id="search_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
    		<button type="button" id="search_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
    	</div>
    	
    	<div class="col-xs-5">
    		{!! Form::select('roles_assg[]', $assg_roles, null, ['id' => 'search_to', 'class' => 'form-control', 'size' => '8', 'multiple' => 'multiple']) !!}
    	</div>
	</div>

	<div class="box-footer">
		{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
	</div>
{!! Form::close() !!}
@section('javascript')
    <script src="{{ asset ("public/assets/admin/js/common.js") }}"></script>
    <script src="{{ asset ("public/assets/admin/js/multiselect.min.js") }}"></script>
    <script src="{{ asset ("public/assets/admin/js/permissions.js") }}"></script>
@endsection