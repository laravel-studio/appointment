@extends('layouts.afterlogin.dashboard')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{__('messages.assign_service')}}
            <small>
                {{__('messages.assign_service_to_employees')}}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('messages.home')}}</a></li>
            <li><a href="{{url('/')}}/employees/services">{{__('messages.employeeservices')}}</a></li>
            <li class="active">{{__('messages.assign_service')}}</li>
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

                        <form action="/employees/services/store" method="POST">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="service_name">{{__('messages.service_name')}}</label>
                            </div>
                            <div class="form-group col-md-12">
                                <select name="service_id" class="form-control" id="service_name">
                                    <option value="">Select Service</option>
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="employees_name">{{__('messages.employee')}}</label>
                            </div>
                            <div class="form-group col-md-12">
                                <select id="employees_name" name="employee_id" class="form-control employees_dd">
                                    <option value="">Select Employees</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label id="service_price">{{__('messages.price')}}</label>
                                <input class="form-control" id="service_price" name="price" style="width:200px;">
                                @error('price')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary">{{__('messages.assign_service')}}</button>
                            </div>
                        </form>
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
