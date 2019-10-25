@extends('layouts.beforelogin.headers')

@section('content')
<div class="register-box">
    <div class="register-logo">
        <a href="{{url('/')}}"><b>{{__("Appointment")}}</b></a>
    </div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
<form method="POST" action="{{ route('password.email') }}">
  @csrf
    <div class="register-box-body">
        <p class="login-box-msg">{{ __('Reset Password') }}</p>

        <div class="form-group has-feedback">
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Adderess" name="email" value="{{ old('email') }}" required autocomplete="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary "> {{ __('Send Password Reset Link') }}</button>
        </div>
        <!-- /.col -->
    </div>
    </div>

</form>
</div>
@endsection
