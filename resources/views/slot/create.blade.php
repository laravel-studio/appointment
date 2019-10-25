@extends('layouts.afterlogin.dashboard')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{__('messages.add_new_slot')}}
                <small>
                    {{__('messages.fill_up_slot_details')}}
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('messages.home')}}</a></li>
                <li><a href="{{url('/')}}/slots">{{__('messages.slots')}}</a></li>
                <li class="active">{{__('messages.add_slot')}}</li>
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
                        <form action="{{url('/')}}/slots/create" method="POST">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="service">{{ __('messages.services')}}</label>
                            </div>
                            <div class="form-group col-md-12">
                                <select class="form-control service_dd" id="service" name="service">
                                    <option value="">{{__('messages.select_service')}}</option>
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
                                 <label id="emplist_label" style="display:none">{{__('messages.select_employee')}}</label>
                                <div class="emplist"></div>
                                @error('employee_service_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="days">{{__('messages.day')}}</label>
                            </div>
                            <div class="form-group col-md-12">
                                <select class="form-control" name="days[]" id="days" multiple="multiple">
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
                                <label for="starttime">{{__('messages.start_time')}}</label>
                                <input class="form-control" type="text" name="starttime" id="starttime" readonly>
                                @error('starttime')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="endtime">{{__('messages.end_time')}}</label>
                                <input class="form-control" type="text" name="endtime" id="endtime" readonly>
                                @error('endtime')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary">{{__('messages.add_slot')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection
