<div class="modal fade" id="confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				{!! Form::button('&times;',['class'=>'close','data-dismiss'=>'modal','aria-hidden'=>'true']) !!}
				<h1 class="modal-title">{!! trans('admin/dashboard.modal.title') !!}</h1>
			</div>
			<div class="modal-body">			
				<p>{!! trans('admin/dashboard.modal.body') !!}</p>
				<input type="hidden" value="" name="row" id="row">
				<input type="hidden" value="{{ $route }}" name="redirect" id="redirect">
			</div>
			<div class="modal-footer">
				{!! Form::button(trans('admin/dashboard.modal.button.yes'),['class'=>'btn btn-primary','data-token'=>csrf_token()]) !!}
				{!! Form::button(trans('admin/dashboard.modal.button.no'),['class'=>'btn btn-default','data-dismiss'=>'modal']) !!}
			</div>
		</div>
	</div>
</div>
