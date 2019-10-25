@extends('layouts.afterlogin.dashboard')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{__('Book New Appointment')}}
            <small>
                {{__('book a new appointment')}}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
            <li><a href="{{url('/')}}/appointments">{{__('Appointments')}}</a></li>
            <li class="active">{{__('Book Appointment')}}</li>
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
                        <div class="form-group col-md-12">
                            <label>{{__('Select Service:')}}</label>
                            <select class="form-control service_book" name="service">
                                <option>Select Service</option>
                                @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12 service-provider-list" style="display:none">
                            <label>{{__('Providers:')}}</label>
                        </div>

                        <div class="form-group serviceemplist"></div>
                        {{-- <div class="emp-form">
                            <div class="form-group col-md-12">
                                <label for="appointment_date">{{__('Date:')}}</label>
                                <input type="date" name="appointment_date" class="form-control" id="appointment_date">
                            </div>
                            <div class="form-group col-md-12">
                                <label>{{__('Comments:')}}</label>
                                <textarea class="form-control" name="comments"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary">Book Appointment</button>
                            </div>

                        </div> --}}
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
