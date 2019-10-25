@extends('layouts.afterlogin.dashboard')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            Employee
            <small>
                list of all employee
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Employee</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('employee.flash-message')
                <div class="box">
                    <div class="box-header">
                    {{-- <h3 class="box-title">Role Types</h3> --}}
                    <span style="float: right;"><a href="{{url('/')}}/employees/create" class="btn btn-info">Add Employee</a></span>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="emplist" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $employee)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>
                                        <a href="{{url('/')}}/employees/edit/{{$employee->id}}" style="padding-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"><span style="padding-left: 3px;">Edit</span></i></a>                   


                                <a  href="" data-toggle="modal" onclick="deleteData('employees',{{$employee->id}})" style="padding-right: 10px;"><i class="fa fa-trash-o" aria-hidden="true">
                                <span style="padding-left: 3px;">{{ __('Delete') }}</span></i>
                                </a>
                                    </td>
                                </tr>
                            @empty
                                    <tr><td colspan="3">No employees yet.</td></tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                        <th>Name</th>
                        <th>Email</th>
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
