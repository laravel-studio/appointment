@extends('layouts.afterlogin.dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            Edit Role
            <small>
                edit roles
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="/roles">Roles</a></li>
            <li class="active">Edit Role</li>
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

                        <form action="/roles/update/{{$role->id}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="role_name">Role Name:</label>
                                <input type="text" name="name" class="form-control" id="role_name" placeholder="Enter roll name ( format: role-name )" value="{{$role->display_name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="role_display_name">Role Display Name:</label>
                                <input type="text" name="display_name" id="role_display_name" class="form-control" placeholder="Enter role display name ( format: Role Name )" value="{{$role->name}}">
                            </div>
                            <div class="form-group">
                                <label for="role_description_name">Role Description:</label>
                                <input type="text" name="description" class="form-control" id="role_description_name" placeholder="Enter role description here ( format: Roles description )" value="{{$role->description}}">
                            </div>
                            <div class="form-group">
                                <label for="permissions">Permissions:</label>
                                <select id="permissions" name="permission[]" class="form-control permission_dd" multiple="multiple">
                                    <option value="" class="form-control">Select</option>
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{in_array($permission->id,$role_permissions)?"selected":""}}>{{ $permission->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Update Role</button>
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
