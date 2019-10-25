@extends('layouts.afterlogin.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{__('messages.add_role')}}
            <small>
                {{__('messages.add_new_role')}}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('messages.home')}}</a></li>
            <li><a href="{{url('/')}}/roles">{{__('messages.roles')}}</a></li>
            <li class="active">{{__('messages.add_role')}}</li>
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

                        <form action="{{url('/')}}/roles/store" method="POST">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="role_name">{{__('messages.role_name')}}</label>
                                <input type="text" name="name" class="form-control" id="role_name" placeholder="{{__('messages.role_name')}}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="role_display_name">{{__('messages.role_display_name')}}</label>
                                <input type="text" name="display_name" id="role_display_name" class="form-control" placeholder="{{__('messages.role_display_name')}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="role_description_name">{{__('messages.role_description')}}</label>
                                <input type="text" name="description" class="form-control" id="role_description_name" placeholder="{{__('messages.role_description')}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="permissions">{{__('messages.permissions')}}</label>
                                <br>
                                <select id="permissions" name="permission[]" class="form-control permission_dd" multiple="multiple">
                                    <option value="" class="form-control">Select</option>
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary">{{__('messages.add_role')}}</button>
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
