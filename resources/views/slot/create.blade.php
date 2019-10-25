@extends('layouts.afterlogin.dashboard')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{__('Add New Slot')}}
                <small>
                    {{__('Fill up slot details.')}}
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
                <li><a href="{{url('/')}}/slots">{{__('Slots')}}</a></li>
                <li class="active">{{__('Add Slot')}}</li>
            </ol>
        </section>
        <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        {{-- <h3 class="box-title">Slot</h3> --}}
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="/slots/create" method="POST">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="service">{{ __('Service:')}}</label>
                                <select class="form-control service_dd" id="service" name="service">
                                    <option value="">{{__('Select Service')}}</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                @error('service')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                 <label id="emplist_label" style="display:none">{{__('Select Employee:')}}</label>
                                <div class="emplist"></div>
                                @error('employee_service_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label id="days">{{__('Days')}}</label>
                                <select class="form-control" name="days" id="days">
                                    <option value="">Select Days</option>
                                    @foreach($days as $day)
                                        <option value="{{$day}}">{{$day}}</option>
                                    @endforeach
                                </select>
                                @error('days')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="starttime">{{__('Start Time:')}}</label>
                                <input class="form-control" type="time" name="starttime" id="starttime">
                                @error('starttime')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="endtime">{{__('End Time:')}}</label>
                                <input class="form-control" type="time" name="endtime" id="endtime">
                                @error('endtime')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary">{{__('Add Slot')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection
