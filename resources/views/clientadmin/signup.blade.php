@extends('clientadmin.layouts.login_layout')

@section('content')
<div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
       {!! Form::open(array('url' => 'registerme')) !!}
          {{ csrf_field() }}
          <div class="form-group has-feedback">
            <input type="text" name="name" id="name" class="form-control" placeholder="Full name" 
              value="{{ old('name') }}" >
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
          <div class="form-group has-feedback">
            <input type="email" name="email" id="email" class="form-control" placeholder="Email"  
            value="{{ old('email') }}" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
          <div class="form-group has-feedback">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
          <div class="form-group has-feedback">
            <input type="password"name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
             <!--  <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div> -->
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        {!! Form::close() !!}

<!--        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a>
        </div>-->

        <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div>
@endsection
