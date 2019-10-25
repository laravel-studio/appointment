@extends('layouts.afterlogin.dashboard')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{__('messages.employee')}}
            <small>
                {{__('messages.list_of_all_employee')}}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{__('messages.home')}}</a></li>
            <li class="active">{{__('messages.employee')}}</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('employee.flash-message')
                <div class="box">
                    <div class="box-header">
                    {{-- <h3 class="box-title">Role Types</h3> --}}
                    <span style="float: right;"><a href="{{url('/')}}/employees/create" class="btn btn-info">{{__('messages.add_employee')}}</a></span>
                    </div>
                    <!-- /.box-header -->
                    @if($employees != '')
                    <div class="col-md-12">
                        <span><a href="{{url('/')}}/employees/export" class="btn btn-success"><i class="fa fa-table" aria-hidden="true" style="padding-right:7px;"></i>{{__('messages.export_as_excel')}}</a></span>
                    </div>
                    @endif
                    <div class="box-body">
                    <table id="emplist" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                        <th>{{__('messages.name')}}</th>
                        <th>{{__('messages.email')}}</th>
                        <th>{{__('messages.actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $employee)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>
                                        <a href="{{url('/')}}/employees/edit/{{$employee->id}}" style="padding-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"><span style="padding-left: 3px;">{{__('messages.edit')}}</span></i></a>


                                <a  href="" data-toggle="modal" onclick="deleteData('employees',{{$employee->id}})" style="padding-right: 10px;"><i class="fa fa-trash-o" aria-hidden="true">
                                <span style="padding-left: 3px;">{{ __('messages.delete') }}</span></i>
                                </a>
                                    </td>
                                </tr>
                            @empty
                                    <tr><td colspan="3">{{__('messages.no_employees_yet')}}</td></tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                        <th>{{__('messages.name')}}</th>
                        <th>{{__('messages.email')}}</th>
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
