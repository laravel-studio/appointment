@extends('layouts.afterlogin.dashboard')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{__('Employee Services')}}
            <small>
                {{__('Services according to assigned employees')}}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
            <li class="active">{{__('Employeeservices')}}</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('employeeservice.flash-message')
                <div class="box">
                    <div class="box-header">
                    {{-- <h3 class="box-title">Role Types</h3> --}}
                    <span style="float: right;"><a href="{{url('/')}}/employees/services/assign" class="btn btn-info">{{__('Assign Service')}}</a></span>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="employeeservicelist" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{__('Service')}}</th>
                                <th>{{__('Employee(s)')}}</th>
                                <th>{{__('Price')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employeeservices as $employeeservice)
                                <tr>
                                    <td>{{ $employeeservice->services->title }}</td>
                                    <td>{{ $employeeservice->users->name }}</td>
                                    <td>{{ $employeeservice->price }}</td>
                                    <td>
                                        <a href="{{url('/')}}/employees/services/edit/{{$employeeservice->id}}" style="padding-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"><span style="padding-left: 3px;">{{__('Edit')}}</span></i></a>
                                        <a href="" data-toggle="modal" onclick="deleteData('employeeservices',{{$employeeservice->id}})" style="padding-right: 10px;"><i class="fa fa-trash-o" aria-hidden="true"><span style="padding-left: 3px;">{{__('Delete')}}</span></i></a>
                                    </td>
                                </tr>
                                @empty
                                    <tr><td colspan="4">{{__('No services yet.')}}</td></tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{__('Service')}}</th>
                                <th>{{__('Employee(s)')}}</th>
                                <th>{{__('Price')}}</th>
                                <th>{{__('Actions')}}</th>
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
