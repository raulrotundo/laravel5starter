@extends('admin.layouts.master')
@section('title', trans('admin/users.title_page.users'))
@section('content')
	<div class="box-body" data-ajxtable="users">		
		<table id="users_table" class="table table-striped table-bordered dt-responsive nowrap">
			<thead>
				<tr>
					<th>{{ trans('admin/users.show.id') }}</th>
					<th>{{ trans('admin/users.show.name') }}</th>
					<th>{{ trans('admin/users.show.email') }}</th>
					<th>{{ trans('admin/users.show.status_title') }}</th>
					<th>{{ trans('admin/users.show.actions') }}</th>
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
