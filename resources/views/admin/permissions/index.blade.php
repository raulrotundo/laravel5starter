@extends('admin.layouts.master')
@section('title', 'Permissions')
@section('content')
	<div class="box-body" data-ajxtable="permissions">		
		<table id="permissions_table" class="table table-striped table-bordered dt-responsive nowrap">
			<thead>
				<tr>
					<th>Id</th>
					<th>Permission</th>
					<th>Slug</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	@include('admin.partials.master.deletemodal')
@endsection
@section('javascript')
    <script src="{{ asset ("public/assets/admin/js/table.grid.js") }}"></script>
@endsection
