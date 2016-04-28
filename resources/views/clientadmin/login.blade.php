@extends('clientadmin.layouts.login_layout')

@section('content')

    <div class="login-box">
      <div class="login-logo">
          @if($role=="client")
        <b>Client</b> Admin Panel
        @else
        <b>Appsbloom</b> Admin Panel
        @endif
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
          {!! Form::open(array('url' => 'tologin/'.$role)) !!}
          {{ csrf_field() }}
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }} ">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
           @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
          <div class="row">
            @if (session('loginmessage'))
            <div class="col-xs-12">
              {{ session('loginmessage') }}
              </div>
              @endif
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
         {!! Form::close() !!}

<!--        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div> /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
<!--        <a href="{{ url('/') }}" class="text-center">Register a new membership</a>-->

      </div><!-- /.login-box-body -->
    </div>
    @endsection
