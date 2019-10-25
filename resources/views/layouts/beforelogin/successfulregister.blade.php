@extends('layouts.beforelogin.headers')

@section('content')

<div class="register-box">
    <div class="box-body">
        <div class="alert alert-info alert-dismissible">
            <h4><i class="icon fa fa-info"></i> {{__('You have successful register') }}!</h4>
            <p>{{ __('Please confirm you email id')}}</p>
        </div>
    </div>
</div>

@endsection
