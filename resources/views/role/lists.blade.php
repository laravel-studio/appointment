    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{__('messages.roles')}}
            <small>
                {{__('messages.list_of_all_roles')}}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{__('messages.home')}}</a></li>
            <li class="active">{{__('messages.roles')}}</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('role.flash-message')
                <div class="box col-md-12">
                    <div class="box-header">
                        <span style="float: right;"><a href="{{url('/')}}/roles/create" class="btn btn-info">{{__('messages.add_role')}}</a></span>
                    </div>
                    <!-- /.box-header -->
                    @if($role != '')
                        <div class="col-md-12">
                            <span><a href="{{url('/')}}/roles/exportexcel" class="btn btn-success"><i class="fa fa-table" aria-hidden="true" style="padding-right:7px;"></i>{{__('messages.export_as_excel')}}</a></span>
                        </div>
                    @endif
                    <div class="box-body">
                    <table id="rolelist" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{__('messages.role_display_name')}}</th>
                            <th>{{__('messages.role_name')}}</th>
                            <th>{{__('messages.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($role as $roles)
                                <tr>
                                    <td>{{ ucwords($roles->display_name) }}</td>
                                    <td>{{ $roles->name }}</td>
                                    <td>
                                        <a href="roles/edit/{{$roles->id}}" style="padding-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"><span style="padding-left: 3px;">{{__('messages.edit')}}</span></i></a>
                                    </td>
                                </tr>
                                @empty
                                    <tr><td colspan="3">{{__('messages.no_roles_yet')}}</td></tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{__('messages.role_display_name')}}</th>
                            <th>{{__('messages.role_name')}}</th>
                            <th>{{__('messages.actions')}}</th>
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
