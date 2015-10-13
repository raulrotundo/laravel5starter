@extends('admin.layouts.master')
@section('title', trans('admin/profile.title_page.index'))
@section('content')
<div class="row row-profile">
  <div class="col-md-3">
    <div class="box box-primary">
      <div class="box-body box-profile">
        @if ($user->avatar)
          <img src="{{ $user->avatar }}" class="profile-user-img img-responsive img-circle" alt="{{ $user->name }}" />
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

    <!-- Inactive -->
    <div class="box box-default">
      <div class="box-body box-profile">
        @if ($user->avatar)
          <img src="{{ $user->avatar }}" class="profile-user-img img-responsive img-circle" alt="{{ $user->name }}" />
        @endif
        <p class="text-muted text-center"> [Inactive version] </p>
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
  </div>
  <?php /** ?>
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#activity" aria-expanded="true">Activity</a></li>
        <li class=""><a data-toggle="tab" href="#timeline" aria-expanded="false">Timeline</a></li>
        <li class=""><a data-toggle="tab" href="#settings" aria-expanded="false">Settings</a></li>
      </ul>
      <div class="tab-content">
        <div id="activity" class="tab-pane active">
          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img alt="user image" src="../../dist/img/user1-128x128.jpg" class="img-circle img-bordered-sm">
              <span class="username">
                <a href="#">Jonathan Burke Jr.</a>
                <a class="pull-right btn-box-tool" href="#"><i class="fa fa-times"></i></a>
              </span>
              <span class="description">Shared publicly - 7:30 PM today</span>
            </div><!-- /.user-block -->
            <p>
              Lorem ipsum represents a long-held tradition for designers,
              typographers and the like. Some people hate it and argue for
              its demise, but others ignore the hate as they create awesome
              tools to help create filler text for everyone from bacon lovers
              to Charlie Sheen fans.
            </p>
            <ul class="list-inline">
              <li><a class="link-black text-sm" href="#"><i class="fa fa-share margin-r-5"></i> Share</a></li>
              <li><a class="link-black text-sm" href="#"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
              <li class="pull-right"><a class="link-black text-sm" href="#"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li>
            </ul>

            <input type="text" placeholder="Type a comment" class="form-control input-sm">
          </div><!-- /.post -->

          <!-- Post -->
          <div class="post clearfix">
            <div class="user-block">
              <img alt="user image" src="../../dist/img/user7-128x128.jpg" class="img-circle img-bordered-sm">
              <span class="username">
                <a href="#">Sarah Ross</a>
                <a class="pull-right btn-box-tool" href="#"><i class="fa fa-times"></i></a>
              </span>
              <span class="description">Sent you a message - 3 days ago</span>
            </div><!-- /.user-block -->
            <p>
              Lorem ipsum represents a long-held tradition for designers,
              typographers and the like. Some people hate it and argue for
              its demise, but others ignore the hate as they create awesome
              tools to help create filler text for everyone from bacon lovers
              to Charlie Sheen fans.
            </p>

            <form class="form-horizontal">
              <div class="form-group margin-bottom-none">
                <div class="col-sm-9">
                  <input placeholder="Response" class="form-control input-sm">
                </div>                          
                <div class="col-sm-3">
                  <button class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                </div>                          
              </div>                        
            </form>
          </div><!-- /.post -->

          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img alt="user image" src="../../dist/img/user6-128x128.jpg" class="img-circle img-bordered-sm">
              <span class="username">
                <a href="#">Adam Jones</a>
                <a class="pull-right btn-box-tool" href="#"><i class="fa fa-times"></i></a>
              </span>
              <span class="description">Posted 5 photos - 5 days ago</span>
            </div><!-- /.user-block -->
            <div class="row margin-bottom">
              <div class="col-sm-6">
                <img alt="Photo" src="../../dist/img/photo1.png" class="img-responsive">
              </div><!-- /.col -->
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-6">
                    <img alt="Photo" src="../../dist/img/photo2.png" class="img-responsive">
                    <br>
                    <img alt="Photo" src="../../dist/img/photo3.jpg" class="img-responsive">
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <img alt="Photo" src="../../dist/img/photo4.jpg" class="img-responsive">
                    <br>
                    <img alt="Photo" src="../../dist/img/photo1.png" class="img-responsive">
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.col -->
            </div><!-- /.row -->

            <ul class="list-inline">
              <li><a class="link-black text-sm" href="#"><i class="fa fa-share margin-r-5"></i> Share</a></li>
              <li><a class="link-black text-sm" href="#"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
              <li class="pull-right"><a class="link-black text-sm" href="#"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li>
            </ul>

            <input type="text" placeholder="Type a comment" class="form-control input-sm">
          </div><!-- /.post -->
        </div><!-- /.tab-pane -->
        <div id="timeline" class="tab-pane">
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

        <div id="settings" class="tab-pane">
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
