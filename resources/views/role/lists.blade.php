    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{-- Data Tables --}}
            Roles
            <small>
                {{-- advanced tables --}}
                all role types
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Roles</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('role.flash-message')
                <div class="box">
                    <div class="box-header">
                    {{-- <h3 class="box-title">Role Types</h3> --}}
                    <span style="float: right;"><a href="{{url('/')}}/roles/create" class="btn btn-info">Add Role</a></span>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="rolelist" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                        <th>Display Name</th>
                        <th>Name</th>
                        <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($role as $roles)
                                <tr>
                                    <td>{{ $roles->display_name }}</td>
                                    <td>{{ $roles->name }}</td>
                                    <td>
                                        <a href="roles/edit/{{$roles->id}}" style="padding-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"><span style="padding-left: 3px;">Edit</span></i></a>

                                        
                                    </td>
                                </tr>
                                @empty
                                    <tr><td colspan="3">No roles yet.</td></tr>
                            @endforelse

                        </tbody>
                        <tfoot>
                        <tr>
                        <th>Display Name</th>
                        <th>Name</th>
                        <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        @include('layouts.afterlogin.deletemodal')
    </div>
    @endsection
    <!-- /.content -->
