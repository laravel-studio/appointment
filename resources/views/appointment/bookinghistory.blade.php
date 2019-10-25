@extends('layouts.afterlogin.dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{ __('Booking History') }}
            <small>
                {{ __('Booking history of all customers') }}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
            <li><a href="{{url('/')}}/appointments">{{ __('Appointments') }}</a></li>
            <li class="active">{{ __('Booking-History') }}</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                        {{-- <h3 class="box-title">Role Types</h3> --}}
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="customer_name">{{__('Choose Customer:')}}</label>
                                <select class="form-control customer_applist" id="customer_name" name="customer_name">
                                    <option value="">Select</option>
                                    @foreach($customers as $c)
                                        <option value="{{$c->users->id}}">{{ucfirst($c->users->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="customer_bookinglist">

                            </div>
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
