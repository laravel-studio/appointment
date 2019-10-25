@extends('layouts.beforelogin.headers')

@section('content')

<div class="register-box">
    <div class="box-body">
        <div class="alert alert-info alert-dismissible">
            <h4><i class="icon fa fa-info"></i> {{__('Your email is confirmed ') }}!</h4>
            <a href="{{url('/')}}/login">Click To Login</a>

        </div>
    </div>
</div>

@endsection
