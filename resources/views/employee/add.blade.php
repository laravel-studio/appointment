@extends('layouts.afterlogin.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{__('messages.add_new_employee')}}
            <small>
                {{__('messages.add_new_employee')}}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('messages.home')}}</a></li>
            <li><a href="{{url('/')}}/employees">{{__('messages.employee')}}</a></li>
            <li class="active">{{__('messages.add_employee')}}</li>
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

                        <form action="" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-md-12">
                                <label for="name">{{__('messages.employee_name')}}</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name">{{__('messages.employee_email')}}</label>
                                <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name">{{__('messages.new_password')}}</label>
                                <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}">
                            </div>
                            @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-group col-md-12">
                                <label for="name">{{__('messages.confirm_password')}}</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="{{ old('password_confirmation') }}">
                            </div>
                            @error('password_confirmation')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary">{{__('messages.confirm_password')}}</button>
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
