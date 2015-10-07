
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

	<div class="row">
		<div class="text-center"><h2 class="page-header">Permission assignment's Section</h2></div>
    	<div class="col-xs-5">
    		{!! Form::select('permissions_list[]', $list_permissions, null, ['id' => 'search', 'class' => 'form-control', 'size' => '8', 'multiple' => 'multiple']) !!}
    	</div>
    	
    	<div class="col-xs-2">
    		<button type="button" id="search_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
    		<button type="button" id="search_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
    		<button type="button" id="search_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
    		<button type="button" id="search_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
    	</div>
    	
    	<div class="col-xs-5">
    		{!! Form::select('permissions_assg[]', $assg_permissions, null, ['id' => 'search_to', 'class' => 'form-control', 'size' => '8', 'multiple' => 'multiple']) !!}
    	</div>
	</div>

	<div class="box-footer">
		{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
	</div>
{!! Form::close() !!}
@section('javascript')
    <script src="{{ asset ("public/assets/admin/js/common.js") }}"></script>
    <script src="{{ asset ("public/assets/admin/js/multiselect.min.js") }}"></script>
    <script src="{{ asset ("public/assets/admin/js/roles.js") }}"></script>
@endsection