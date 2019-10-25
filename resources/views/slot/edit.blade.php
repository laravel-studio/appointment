@extends('layouts.afterlogin.dashboard')


@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{__('messages.edit_slot')}}
                <small>
                    {{__('messages.update_slot_details')}}
                </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('messages.home')}}</a></li>
                <li><a href="{{url('/')}}/slots">{{__('messages.slots')}}</a></li>
                <li class="active">{{__('messages.edit_slot')}}</li>
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
                                <label for="service">{{ __('messages.services')}}</label>
                                <input type="text" class="form-control" value="{{$slot->employeeservices->services->title}}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                 <label id="emplist_label">{{__('messages.employees')}}</label>
                                <input type="text" class="form-control" value="{{$slot->employeeservices->users->name}}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="days">{{__('messages.day')}}</label>
                            </div>
                            <div class="form-group col-md-12">
                                <select class="form-control" name="days" id="days">
                                    <option value="">Select Days</option>
                                    @foreach($days as $day)
                                        <option value="{{$day}}" {{$slot->days==$day?"selected":""}}>{{$day}}</option>
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
                                <input class="form-control" type="text" name="starttime" id="starttime" value="{{$slot->start_time}}" readonly>
                                @error('starttime')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="endtime">{{__('messages.end_time')}}</label>
                                <input class="form-control" type="text" name="endtime" id="endtime" value="{{$slot->end_time}}" readonly>
                                @error('endtime')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary">{{__('messages.update_slot')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </section>
    </div>
@endsection
