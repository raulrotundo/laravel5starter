@extends('admin.layouts.access')

@section('title', 'Login')

@section('content')

<div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops! </strong> There were some problems with your input. <br> <br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="login" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                      <div class="checkbox icheck">
                        <label>
                          <input type="checkbox" name="remember"> Remember Me
                      </label>
                  </div>
                </div>
              <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
              </div>
            </div>
        </form>
        <div class="social-auth-links text-center">
          <p>- OR Sign in using -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i>Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-twitter btn-flat"><i class="fa fa-twitter"></i>Twitter</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i>Google+</a>
        </div>
        <a href="password/email">I forgot my password</a><br>
        <a href="register" class="text-center">Register a new membership</a>
    </div>
</div>

@endsection