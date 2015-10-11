@extends('admin.layouts.master')
@section('title', trans('admin/roles.title_page.index'))
@section('content')
	<div class="box-body" data-ajxtable="roles">		
		<table id="roles_table" class="table table-striped table-bordered dt-responsive nowrap">
			<thead>
				<tr>
					<th>{{trans('admin/roles.show.id')}}</th>
					<th>{{trans('admin/roles.show.role')}}</th>
					<th>{{trans('admin/roles.show.slug')}}</th>
					<th>{{trans('admin/roles.show.actions')}}</th>
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
