@extends('layouts.afterlogin.dashboard')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{__('Edit Service Assignments')}}
            <small>
                {{__('Change service assignment details')}}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
            <li><a href="{{url('/')}}/employees/services">{{__('Employeeservices')}}</a></li>
            <li class="active">{{__('Edit Employeeservices')}}</li>
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

                        <form action="/employees/services/update/{{$employeeservices->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-md-12">
                                <label for="service_name">{{__('Service Name')}}</label>
                                <select name="service_id" class="form-control" id="service_name">
                                    <option value="">Select Service</option>
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}" {{$service->id==$employeeservices->services->id?"selected":''}}>{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="employees_name">{{__('Employee:')}}</label>
                                <select id="employees_name" name="employee_id" class="form-control">
                                    <option value="">Select Employees</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}" {{$employee->id==$employeeservices->users->id?"selected":''}}>{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label id="service_price">{{__('Price:')}}</label>
                                <input class="form-control" id="service_price" name="price" value="{{$employeeservices->price}}">
                                @error('price')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary">Update Assignments</button>
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
