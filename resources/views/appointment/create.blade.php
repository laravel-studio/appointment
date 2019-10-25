@extends('layouts.afterlogin.dashboard')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{__('messages.book_appointment')}}
            <small>
                {{__('messages.book_new_appointment')}}
            </small>
        </h1>
        @if(Auth::user()->type==1 || Auth::user()->type==2)
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('messages.home')}}</a></li>
            <li><a href="{{url('/')}}/appointments">{{__('messages.appointments')}}</a></li>
            <li class="active">{{__('messages.book_appointment')}}</li>
        </ol>
        @endif
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
                            <label for="service">{{__('messages.select_service')}}</label>
                        </div>
                        <div class="form-group col-md-12">
                            <select class="form-control service_book" name="service" id="service">
                                <option>Select Service</option>
                                @foreach($services as $service)
                                    <option value="{{$service->id}}">{{$service->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12 service-provider-list" style="display:none">
                            <label>{{__('messages.providers')}}</label>
                        </div>

                        <div class="form-group serviceemplist"></div>
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
