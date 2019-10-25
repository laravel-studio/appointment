@extends('layouts.afterlogin.dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{ __('messages.booking_history') }}
            <small>
                {{ __('messages.booking_history_of_all_customers') }}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('messages.home') }}</a></li>
            <li><a href="{{url('/')}}/appointments">{{ __('messages.appointments') }}</a></li>
            <li class="active">{{ __('messages.booking_history') }}</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group col-md-12">
                                <label for="customer_name">{{__('messages.choose_customer')}}</label>
                            </div>
                            <div class="form-group col-md-12">
                                <select class="form-control customer_applist" id="customer_name" name="customer_name">
                                    <option value="">Select</option>
                                    @foreach($customers as $c)
                                        <option value="{{$c->users->id}}">{{ucfirst($c->users->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="customer_bookinglist"></div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection
