@extends('layouts.afterlogin.dashboard')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{ __('Slots') }}
            <small>
                {{ __('list of all slots') }}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
            <li class="active">{{ __('Slots') }}</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('slot.flash-message')
                <div class="box">
                    <div class="box-header">
                    {{-- <h3 class="box-title">Role Types</h3> --}}
                    <span style="float: right;"><a href="{{url('/')}}/slots/create" class="btn btn-info">{{__('Add Slot')}}</a></span>
                </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    {{-- <span><a class="btn btn-primary" href="{{url('/')}}/slots/download">Download Slots</a></span> --}}
                    <table id="slotlist" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('Service Name') }}</th>
                            <th>{{ __('Employee Name') }}</th>
                            <th>{{__('Days')}}</th>
                            <th>{{__('Price')}}</th>
                            <th>{{__('Start Time')}}</th>
                            <th>{{__('End Time')}}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($slots as $slot)
                                <tr>
                                    <td>{{ $slot->employeeservices->services->title }}</td>
                                    <td>{{ $slot->employeeservices->users->name }}</td>
                                    <td>{{ $slot->days }}</td>
                                    <td>{{ $slot->employeeservices->price }}</td>
                                    <td>{{ $slot->start_time }}</td>
                                    <td>{{ $slot->end_time }}</td>
                                    <td>
                                        <a href="slots/{{$slot->id}}/edit" style="padding-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"><span style="padding-left: 3px;">{{__('Edit')}}</span></i></a>
                                        {{-- <a href="" data-toggle="modal" onclick="deleteData('slots',{{$slot->id}})" style="padding-right: 10px;"><i class="fa fa-trash-o" aria-hidden="true"><span style="padding-left: 3px;">{{__('Delete')}}</span></i></a> --}}
                                    </td>
                                </tr>
                                @empty
                                    <tr><td colspan="6">{{ __('No slots added yet.') }}</td></tr>
                            @endforelse

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('Service Name') }}</th>
                            <th>{{ __('Employee Name') }}</th>
                            <th>{{__('Days')}}</th>
                            <th>{{__('Price')}}</th>
                            <th>{{__('Start Time')}}</th>
                            <th>{{__('End Time')}}</th>
                            <th>{{ __('Actions') }}</th>
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
