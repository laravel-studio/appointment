@extends('layouts.afterlogin.dashboard')


@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{__('Edit Slot')}}
                <small>
                    {{__('Update slot details.')}}
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
                <li><a href="{{url('/')}}/slots">{{__('Slots')}}</a></li>
                <li class="active">{{__('Edit Slot')}}</li>
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
                        <form action="{{ route('slots.update',$slot->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-md-12">
                                <label for="service">{{ __('Service:')}}</label>
                                <input type="text" class="form-control" value="{{$slot->employeeservices->services->title}}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                 <label id="emplist_label">{{__('Employee:')}}</label>
                                <input type="text" class="form-control" value="{{$slot->employeeservices->users->name}}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label id="days">{{__('Days')}}</label>
                                <select class="form-control" name="days" id="days">
                                    <option value="">Select Days</option>
                                    @foreach($days as $day)
                                        <option value="{{$slot->days}}" {{$slot->days?"selected":""}}>{{$day}}</option>
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
                                <input class="form-control" type="time" name="starttime" id="starttime" value="{{$slot->start_time}}">
                                @error('starttime')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="endtime">{{__('End Time:')}}</label>
                                <input class="form-control" type="time" name="endtime" id="endtime" value="{{$slot->end_time}}">
                                @error('endtime')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary">{{__('Update Slot')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection
