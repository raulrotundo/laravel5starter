<?php
  $htmlStatus = array(
    'status' => ($user->active == 1 ) ? 'active'      : 'inactive',
    'box'    => ($user->active == 1 ) ? 'box-primary' : 'box-default',
    'btn'    => ($user->active == 1 ) ? ''            : 'disabled',
  );
?>
@extends('admin.layouts.master')
@section('title', trans('admin/profile.title_page.index'))
@section('content')
<div class="row row-profile">
  <div class="col-md-3">
    <div class="box {{ $htmlStatus['box'] }}">
      <div class="box-body box-profile">
        <a data-toggle="modal" href="{!! route('admin.profile.editAvatar') !!}" data-target="#avatarMdl">
          <img class="profile-user-img img-responsive img-circle" src="{{ $user->avatar ?: asset(config('assets.images.paths.input')."/noavatar.jpg") }}" alt="{{ $user->name ?: '-' }}" />
        </a>
        <h3 class="profile-username text-center">{{ $user->name ?: '-' }}</h3>
        <p class="text-muted text-center">{{ $user->email ?: '-' }}</p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>{{ trans('admin/users.form.country.title') }}</b> <a class="pull-right">{{ $user->Countries->name ?: '-' }}</a>
          </li>
          <li class="list-group-item">
            <b>{{ trans('admin/users.form.city.title') }}</b> <a class="pull-right">{{ $user->city ?: '-' }}</a>
          </li>
        </ul>

        <a class="btn btn-primary btn-block {{ $htmlStatus['btn'] }}" href="#"><b>{{ trans('admin/profile.index.status.'.$htmlStatus['status']) }}</b></a>
      </div>
    </div>
  </div>

  <?php /**/ ?>
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab1" aria-expanded="true">{{ trans('admin/profile.index.tab.userInfo') }}</a></li>
        <li class=""><a data-toggle="tab" href="#tab2" aria-expanded="false">{{ trans('admin/profile.index.tab.services') }}</a></li>
        <li class=""><a data-toggle="tab" href="#tab3" aria-expanded="false">{{ trans('admin/profile.index.tab.companies') }}</a></li>
      </ul>
      <div class="tab-content">
        <div id="tab1" class="tab-pane active">
          <div class="row">
            <div class="col-md-12">
              <a class="link-black text-sm pull-right" href="{!! route('admin.profile.edit') !!}"><i class="fa fa-pencil margin-r-5"></i> {{ trans('admin/profile.index.edit') }}</a>
            </div>
            <div class="col-md-4" style="margin:10px auto;">
              <b>{{ trans('admin/users.form.name.title') }}</b><br><a class="pull">{{ ($user->name) ?: '-' }}</a>
            </div>
            <div class="col-md-4" style="margin:10px auto;">
              <b>{{ trans('admin/users.form.email.title') }}</b><br>
              <a class="pull">{{ $user->email ?: '-' }}</a>
            </div>
            <div class="col-md-4" style="margin:10px auto;">
              <b>{{ trans('admin/users.form.phone.title') }}</b><br>
              <a class="pull">{{ $user->phone ?: '-' }}</a>
            </div>
            <div class="col-md-4" style="margin:10px auto;">
              <b>{{ trans('admin/users.form.country.title') }}</b><br>
              <a class="pull">{{ $user->countries->name ?: '-' }}</a>
            </div>
            <div class="col-md-4" style="margin:10px auto;">
              <b>{{ trans('admin/users.form.city.title') }}</b><br>
              <a class="pull">{{ $user->city ?: '-' }}</a>
            </div>
            <div class="col-md-4" style="margin:10px auto;">
              <b>{{ trans('admin/users.form.zipcode.title') }}</b><br>
              <a class="pull">{{ $user->zipcode ?: '-' }}</a>
            </div>
            <div class="col-md-12" style="margin:10px auto;">
              <b>{{ trans('admin/users.form.address.title') }}</b><br>
              <a class="pull">{{ $user->address ?: '-' }}</a>
            </div>
          </div>
        </div><!-- /.tab-pane -->

        <div id="tab2" class="tab-pane">
          <!-- In process list -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <span class="badge bg-light-blue" title="" data-toggle="tooltip" data-original-title="3 {{ trans('admin/profile.index.services.inprocess') }}">3</span>
                <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
              </div><br>
              <h3 class="box-title">{{ trans('admin/profile.index.services.inprocess') }}</h3>
            </div><!-- /.box-header -->
            <div class="box-body" style="display: block;">
              <h3>[ {{ trans('admin/profile.index.services.inprocess') }} ]</h3>
            </div><!-- /.box-body -->
          </div>

          <!-- completed list -->
          <div class="box box-success collapsed-box">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <span class="badge bg-green" title="" data-toggle="tooltip" data-original-title="5 {{ trans('admin/profile.index.services.completed') }}">5</span>
                <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
              </div><br>
              <h3 class="box-title">{{ trans('admin/profile.index.services.completed') }}</h3>
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
              <h3>[ {{ trans('admin/profile.index.services.completed') }} ]</h3>
            </div><!-- /.box-body -->
          </div>

          <!-- cancelled list -->
          <div class="box box-danger collapsed-box">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <span class="badge bg-red" title="" data-toggle="tooltip" data-original-title="1 {{ trans('admin/profile.index.services.cancelled') }}">1</span>
                <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
              </div><br>
              <h3 class="box-title">{{ trans('admin/profile.index.services.cancelled') }}</h3>
            </div><!-- /.box-header -->
            <div class="box-body" style="display: none;">
              <h3>[ {{ trans('admin/profile.index.services.cancelled') }} ]</h3>
            </div><!-- /.box-body -->
          </div>
        </div><!-- /.tab-pane -->

        <div id="tab3" class="tab-pane">

            <div class="box box-widget widget-user">
              <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username">Company Name</h3>
                <h5 class="widget-user-desc">company@email.com</h5>
              </div>
              <div class="widget-user-image">
                <img alt="Company avatar" src="{{ asset(config('assets.images.paths.input')."/noavatar.com.png") }}" class="img-circle">
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Company Country</h5>
                      <span class="description-text">{{ trans('admin/profile.index.companies.country') }}</span>
                    </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Company City</h5>
                      <span class="description-text">{{ trans('admin/profile.index.companies.city') }}</span>
                    </div><!-- /.description-block -->
                  </div><!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">www.companyweb.com</h5>
                      <span class="description-text">{{ trans('admin/profile.index.companies.website') }}</span>
                    </div><!-- /.description-block -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
                <a class="link-black text-sm pull-right" href="#"><i class="fa fa-share margin-r-5"></i> {{ trans('admin/profile.index.go') }}</a>
              </div>
            </div><!-- /.widget-user -->

        </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div>
  <?php /**/ ?>
</div>
@endsection
@section('javascript')
    <script src="{{ asset ("public/assets/admin/js/profile.js") }}"></script>
@endsection
