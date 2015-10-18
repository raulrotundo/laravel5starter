{!! Form::model($user, ['route' => [$action], 'method'=>'PUT', 'files'=>true]) !!}
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">{{ trans('admin/profile.form.avatar.title') }}</h4>
</div>
<div class="modal-body">
	<div class="te">
		<div class="form-group">
			{!! Form::file('avatar', ['class' => 'form-control', 'style' => '', 'id' => 'avatar_input']) !!}
			<br />
			<div class="text-center">
				@if ($user->avatar)
				<img src="{{$user->avatar}}" class="img-circle avatar_input">
				{!! Form::label('avatar_remove', trans('admin/users.form.remove_avatar')) !!}
				{!! Form::checkbox('avatar_remove', '1') !!}
				@else 
				<img src="{{asset(config('assets.images.paths.input')."/noavatar.jpg")}}" class="img-circle avatar_input">
				@endif
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin/profile.form.avatar.close') }}</button>
	{!! Form::submit(trans('admin/profile.form.avatar.submit'), array('class' => 'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
<script src="{{ asset ("public/assets/admin/js/common.js") }}"></script>
<script src="{{ asset ("public/assets/admin/js/users.js") }}"></script>