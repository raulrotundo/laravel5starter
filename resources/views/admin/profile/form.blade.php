
 @if (isset($action))
    {!! Form::model($role, ['route' => [$action, $role->id ], 'method'=>'PUT']) !!}
@else
    {!! Form::open(['route' => 'admin.roles.store']) !!}
@endif 
	<div class="box-body">
		<div class="form-group">
			{!! Form::label('role_title', trans('admin/roles.form.role.title'), ['class' => 'control-label']) !!}
			{!! Form::text('role_title', null, ['class' => 'form-control','placeholder' => trans('admin/roles.form.role.placeholder')]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('role_slug', trans('admin/roles.form.slug.title'), ['class' => 'control-label']) !!}
			{!! Form::text('role_slug', null, ['class' => 'form-control','placeholder' => trans('admin/roles.form.slug.placeholder')]) !!}
		</div>
		<div class="form-group">
			{!! Form::label('description', trans('admin/roles.form.description.title'), ['class' => 'control-label']) !!}
			{!! Form::text('description', null, ['class' => 'form-control','placeholder' => trans('admin/roles.form.description.placeholder')]) !!}
		</div>
	</div>

	<div class="row">
		<div class="text-center"><h2 class="page-header">{{trans('admin/roles.form.assign_roles_section')}}</h2></div>
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
		{!! Form::submit(trans('admin/roles.form.submit'), array('class' => 'btn btn-primary')) !!}
	</div>
{!! Form::close() !!}
@section('javascript')
    <script src="{{ asset ("public/assets/admin/js/common.js") }}"></script>
    <script src="{{ asset ("public/assets/admin/js/multiselect.min.js") }}"></script>
    <script src="{{ asset ("public/assets/admin/js/roles.js") }}"></script>
@endsection