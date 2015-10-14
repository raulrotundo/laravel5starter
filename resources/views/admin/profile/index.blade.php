@extends('admin.layouts.master')
@section('title', trans('admin/profile.title_page.index'))
@section('content')
<div class="row row-profile">
  <div class="col-md-3">
    <div class="box box-primary">
      <div class="box-body box-profile">
        @if ($user->avatar)
          <img class="profile-user-img img-responsive img-circle" src="{{ $user->avatar }}" alt="{{ $user->name }}" />
        @else
          <img class="profile-user-img img-responsive img-circle" src="{{asset(config('assets.images.paths.input')."/noavatar.jpg")}}">
        @endif
        <h3 class="profile-username text-center">{{ $user->name }}</h3>
        <p class="text-muted text-center">{{ $user->email }}</p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>{{ trans('admin/profile.index.country') }}</b> <a class="pull-right">{{ $user->Countries->name }}</a>
          </li>
          <li class="list-group-item">
            <b>{{ trans('admin/profile.index.city') }}</b> <a class="pull-right">{{ $user->city }}</a>
          </li>
        </ul>

        <a class="btn btn-primary btn-block" href="#"><b>{{ trans('admin/profile.index.status.active') }}</b></a>
      </div>
    </div>

    <?php /** ?>
    <!-- Inactive -->
    <div class="box box-default">
      <div class="box-body box-profile">
        @if ($user->avatar)
          <img src="{{ $user->avatar }}" class="profile-user-img img-responsive img-circle" alt="{{ $user->name }}" />
        @endif
        <h3 class="profile-username text-center">{{ $user->name }}</h3>
        <p class="text-muted text-center">{{ $user->email }}</p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>{{ trans('admin/profile.index.phone') }}</b> <a class="pull-right">{{ $user->phone }}</a>
          </li>
          <li class="list-group-item">
            <b>{{ trans('admin/profile.index.country') }}</b> <a class="pull-right">{{ $user->Countries->name }}</a>
          </li>
          <li class="list-group-item">
            <b>{{ trans('admin/profile.index.city') }}</b> <a class="pull-right">{{ $user->city }}</a>
          </li>
          <li class="list-group-item">
            <b>{{ trans('admin/profile.index.zipcode') }}</b> <a class="pull-right">{{ $user->zipcode }}</a>
          </li>
        </ul>

        <a class="btn btn-primary btn-block disabled" href="#"><b>{{ trans('admin/profile.index.status.inactive') }}</b></a>
      </div>
    </div>
    <?php /**/ ?>
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
            <div class="col-md-4"><b>{{ trans('admin/users.form.name.title') }}</b> <a class="pull">{{ $user->name }}</a></div>
            <div class="col-md-4"><b>{{ trans('admin/users.form.email.title') }}</b> <a class="pull">{{ $user->email }}</a></div>
            <div class="col-md-4"><b>{{ trans('admin/users.form.phone.title') }}</b> <a class="pull">{{ $user->phone }}</a></div>
            <div class="col-md-4"><b>{{ trans('admin/users.form.country.title') }}</b> <a class="pull">{{ $user->countries->name }}</a></div>
            <div class="col-md-4"><b>{{ trans('admin/users.form.city.title') }}</b> <a class="pull">{{ $user->city }}</a></div>
            <div class="col-md-4"><b>{{ trans('admin/users.form.zipcode.title') }}</b> <a class="pull">{{ $user->zipcode }}</a></div>
            <div class="col-md-12"><b>{{ trans('admin/users.form.address.title') }}</b> <a class="pull">{{ $user->address }}</a></div>
          </div>
        </div><!-- /.tab-pane -->

        <div id="tab2" class="tab-pane">
          <!-- The timeline -->
          <ul class="timeline timeline-inverse">
            <!-- timeline time label -->
            <li class="time-label">
              <span class="bg-red">
                10 Feb. 2014
              </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope bg-blue"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                <div class="timeline-body">
                  Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                  weebly ning heekya handango imeem plugg dopplr jibjab, movity
                  jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                  quora plaxo ideeli hulu weebly balihoo...
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-comments bg-yellow"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                <div class="timeline-body">
                  Take me to your leader!
                  Switzerland is small and neutral!
                  We are more like Germany, ambitious and misunderstood!
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
            <li class="time-label">
              <span class="bg-green">
                3 Jan. 2014
              </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-camera bg-purple"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                <div class="timeline-body">
                  <img class="margin" alt="..." src="http://placehold.it/150x100">
                  <img class="margin" alt="..." src="http://placehold.it/150x100">
                  <img class="margin" alt="..." src="http://placehold.it/150x100">
                  <img class="margin" alt="..." src="http://placehold.it/150x100">
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div><!-- /.tab-pane -->

        <div id="tab3" class="tab-pane">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label" for="inputName">Name</label>
              <div class="col-sm-10">
                <input type="email" placeholder="Name" id="inputName" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="inputEmail">Email</label>
              <div class="col-sm-10">
                <input type="email" placeholder="Email" id="inputEmail" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="inputName">Name</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Name" id="inputName" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="inputExperience">Experience</label>
              <div class="col-sm-10">
                <textarea placeholder="Experience" id="inputExperience" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="inputSkills">Skills</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Skills" id="inputSkills" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-danger" type="submit">Submit</button>
              </div>
            </div>
          </form>
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
