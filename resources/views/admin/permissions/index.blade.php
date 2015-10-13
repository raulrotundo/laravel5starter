@extends('admin.layouts.master')
@section('title', trans('admin/permissions.title_page.index'))
@section('content')
	<div class="box-body" data-ajxtable="permissions">		
		<table id="permissions_table" class="table table-striped table-bordered dt-responsive nowrap">
			<thead>
				<tr>
					<th>{{trans('admin/permissions.show.id')}}</th>
					<th>{{trans('admin/permissions.show.permission')}}</th>
					<th>{{trans('admin/permissions.show.slug')}}</th>
					<th>{{trans('admin/permissions.show.actions')}}</th>
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
