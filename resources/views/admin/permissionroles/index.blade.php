@extends('admin.layouts.master')
@section('title', 'Permissions Assignment')
@section('content')
	<div class="box-body" data-ajxtable="permissionroles">
		<table id="permissionroles_table" class="table table-striped table-bordered dt-responsive nowrap">
			<thead>
				<tr>
					<th>Id</th>
					<th>Role</th>
					<th>Permission</th>
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
