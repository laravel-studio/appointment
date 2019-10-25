@extends('layouts.afterlogin.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{__('messages.edit_role')}}
            <small>
                {{__('messages.edit_role')}}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> {{__('messages.home')}}</a></li>
            <li><a href="/roles">{{__('messages.roles')}}</a></li>
            <li class="active">{{__('messages.edit_role')}}</li>
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

                        <form action="{{url('/')}}/roles/update/{{$role->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group col-md-12">
                                <label for="role_name">{{__('messages.role_name')}}</label>
                                <input type="text" name="name" class="form-control" id="role_name" placeholder="{{__('messages.role_name')}}" value="{{$role->display_name}}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="role_display_name">{{__('Role Display Name:')}}</label>
                                <input type="text" name="display_name" id="role_display_name" class="form-control" placeholder="{{__('messages.role_display_name')}}" value="{{$role->name}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="role_description_name">{{__('messages.role_description')}}</label>
                                <input type="text" name="description" class="form-control" id="role_description_name" placeholder="{{__('messages.role_description')}}" value="{{$role->description}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="permissions">{{__('messages.permissions')}}</label>
                                <br>
                                <select id="permissions" name="permission[]" class="form-control permission_dd" multiple="multiple">
                                    <option value="" class="form-control">Select</option>
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{in_array($permission->id,$role_permissions)?"selected":""}}>{{ $permission->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" name="submit" class="btn btn-primary">{{__('messages.update_role')}}</button>
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
