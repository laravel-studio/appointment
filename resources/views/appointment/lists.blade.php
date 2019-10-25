@extends('layouts.afterlogin.dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{ __('messages.appointments') }}
            <small>
                {{ __('messages.list_of_all_appointments') }}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('messages.home') }}</a></li>
            <li class="active">{{ __('messages.appointments') }}</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('appointment.flash-message')
                <div class="box">
                @if(Auth::user()->type==1 || Auth::user()->type==2)
                <div class="box-header">
                    <span style="float: right;"><a href="{{url('/')}}/appointments/book" class="btn btn-info">{{__('messages.book_appointment')}}</a></span>
                    <span class="row">
                        <a href="{{url('/')}}/appointments/booking-history" class="btn btn-default">{{__('messages.view_history')}}</a>
                        <a href="{{url('/')}}/appointments/booking-reports" class="btn btn-warning" style="padding-left: 10px;">{{__('messages.generate_report')}}</a>
                    </span>
                </div>
                @endif
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="appointmentlist" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('messages.service_name') }}</th>
                            <th>{{ __('messages.employee_name') }}</th>
                            <th>{{__('messages.date')}}</th>
                            <th>{{__('messages.customer_name')}}</th>
                            <th>{{__('messages.start_time')}}</th>
                            <th>{{__('messages.end_time')}}</th>
                            <th>{{ __('messages.status') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments as $appointment)
                                <tr>
                                    <td>{{ucfirst($appointment->slots->employeeservices->services->title)}}</td>
                                    <td>{{ucfirst($appointment->slots->employeeservices->users->name)}}</td>
                                    <td>{{$appointment->booking_date}}</td>
                                    <td>{{ucfirst($appointment->users->name)}}</td>
                                    <td>{{$appointment->start_time}}</td>
                                    <td>{{$appointment->end_time}}</td>
                                    <td>
                                        @if(Auth::user()->type==1)
                                        <div class="col-md-3"><span class="label label-{{$appointment->status==0 ? 'warning': 'success'}}">{{ $appointment->status==0 ? 'Pending': 'Confirmed' }}</span></div>
                                        <div class="col-md-3">
                                        <label class="switch">
                                            <input class="appointment-status" type="checkbox" {{($appointment->status==1) ? 'checked="checked"' : ''}} data-appointmentid="{{$appointment->id}}">
                                            <span class="slider round"></span>
                                        </label>
                                        </div>
                                        @else
                                            <span class="label label-{{$appointment->status==0 ? 'warning': 'success'}}">{{ $appointment->status==0 ? 'Pending': 'Confirmed' }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">{{ __('messages.no_appointments_yet') }}</td>
                                    </tr>
                                @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('messages.service_name') }}</th>
                            <th>{{ __('messages.employee_name') }}</th>
                            <th>{{__('messages.date')}}</th>
                            <th>{{__('messages.customer_name')}}</th>
                            <th>{{__('messages.start_time')}}</th>
                            <th>{{__('messages.end_time')}}</th>
                            <th>{{ __('messages.status') }}</th>
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
