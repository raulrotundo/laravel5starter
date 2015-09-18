<div class="modal fade" id="confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h1 class="modal-title">Delete Data</h1>
			</div>
			<div class="modal-body">			
				<p>Are you sure want to delete this record?</p>
				<input type="hidden" value="" name="row" id="row">
				<input type="hidden" value="{{ $route }}" name="redirect" id="redirect">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-token="{{ csrf_token() }}">Yes</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
			</div>
		</div>
	</div>
</div>
