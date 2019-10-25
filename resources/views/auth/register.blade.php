@extends('layouts.beforelogin.headers')

@section('content')

<div class="register-box">
  <div class="register-logo">
    <a href="{{url('/')}}"><b>{{__("Appointment")}}</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">{{__("Register a new membership")}}</p>

    <form  method="POST" action="{{ route('register') }}">
         @csrf
      <div class="form-group has-feedback">
        <input type="text" class="form-control @error('name') is-invalid @enderror " placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control @error('password') is-invalid @enderror " placeholder="Password" name="password" required autocomplete="new-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password-confirm" placeholder="Confirm password"  name="password_confirmation" required autocomplete="new-password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"> {{ __('Register') }}</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-8">
         <a href="login" class="text-center">I already have a membership</a>
        </div>
      </div>
    </form>

   <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div> -->


  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->





@endsection
