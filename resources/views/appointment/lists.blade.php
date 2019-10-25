@extends('layouts.afterlogin.dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{ __('Appointments') }}
            <small>
                {{ __('list of all appointments') }}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
            <li class="active">{{ __('Appointments') }}</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('appointment.flash-message')
                <div class="box">
                    <div class="box-header">
                    {{-- <h3 class="box-title">Role Types</h3> --}}
                    <span style="float: right;"><a href="{{url('/')}}/appointments/book" class="btn btn-info">{{__('Book Appointment')}}</a></span>
                    <span class="row">
                        <a href="{{url('/')}}/appointments/booking-history" class="btn btn-default">{{__('View History')}}</a>
                        <a href="{{url('/')}}/appointments/booking-reports" class="btn btn-warning" style="padding-left: 10px;">{{__('Generate Report')}}</a>
                    </span>
                </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="appointmentlist" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('Service Name') }}</th>
                            <th>{{ __('Employee Name') }}</th>
                            <th>{{__('Date')}}</th>
                            <th>{{__('Customer Name')}}</th>
                            <th>{{__('Start Time')}}</th>
                            <th>{{__('End Time')}}</th>
                            <th>{{ __('Status') }}</th>
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
                                    <td>{{ $appointment->status==0 ? 'Pending': 'Confirmed' }}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">{{ __('No appointsments yet.') }}</td>
                                    </tr>
                                @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('Service Name') }}</th>
                            <th>{{ __('Employee Name') }}</th>
                            <th>{{__('Date')}}</th>
                            <th>{{__('Customer Name')}}</th>
                            <th>{{__('Start Time')}}</th>
                            <th>{{__('End Time')}}</th>
                            <th>{{ __('Status') }}</th>
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
