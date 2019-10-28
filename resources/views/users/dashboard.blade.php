@extends('layouts.afterlogin.dashboard')
        <!-- Main content -->
    @section('content')
        <!-- Content Header (Page header) -->

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{__('messages.dashboard')}}
        <small>{{__('messages.control_panel')}}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('messages.home')}}</a></li>
        <li class="active">{{__('messages.dashboard')}}</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{$servicescount}}</h3>

              <p>{{__('messages.services')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            @if(Auth::user()->type==1 || Auth::user()->type==2)
            <a href="{{url('/')}}/services" class="small-box-footer">{{__('messages.more_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                @else
                    <div class="small-box-footer" style="height:26px;"></div>
            @endif
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
                <h3>{{$employeescount}}</h3>

              <p>{{__('messages.employees')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            @if(Auth::user()->type==1)
            <a href="{{url('/')}}/employees" class="small-box-footer">{{__('messages.more_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                @else
                    <div class="small-box-footer" style="height:26px;"></div>
            @endif
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{$employeeservicescount}}</h3>

              <p>{{__('messages.employee_services')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-cog"></i>
            </div>
            @if(Auth::user()->type==1)
            <a href="{{url('/')}}/employees/services" class="small-box-footer">{{__('messages.more_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                @else
                <div class="small-box-footer" style="height:26px;"></div>
            @endif
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
                <h3>{{$appointmentscount}}</h3>

              <p>{{__('messages.customer_bookings')}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-calendar"></i>
            </div>
            @if(Auth::user()->type==1 || Auth::user()->type==2)
            <a href="{{url('/')}}/appointments" class="small-box-footer">{{__('messages.more_info')}} <i class="fa fa-arrow-circle-right"></i></a>
                @else
                    <div class="small-box-footer" style="height:26px;"></div>
            @endif
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            @if(Auth::user()->type==config('global.user_type.superadmin'))
            <ul class="nav nav-tabs pull-right">
              <li class="pull-left header"><i class="fa fa-list-alt"></i> {{__('messages.bookings')}}</li>
            </ul>
            <div class="tab-content">
              <!-- Morris chart - Sales -->
                <div class="chart" id="revenue_chart" style="position: relative; height: 350px;">{!! $chart->html() !!}</div>
            </div>
            @else
              <ul class="nav nav-tabs pull-right">
                <li class="pull-left header"><i class="fa fa-list-alt"></i> {{__('Calender Booking')}}</li>
              </ul>
              <div class="tab-content" style="height: 350px;">
                  <a href="{{url('/')}}/booking/calender" class="btn btn-default" style="position: relative;top: 290px;float: right;">{{__('View Calender')}}</a>
              </div>
            @endif
          </div>
          <!-- /.nav-tabs-custom -->

            <!-- TABLE: LATEST ORDERS -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            @if(Auth::user()->type==1 || Auth::user()->type==2)
                                <h3 class="box-title">{{__('messages.latest_bookings')}}</h3>
                                @else
                                <h3 class="box-title">{{__('messages.appointment')}}</h3>
                            @endif
                        </div>
                        <!-- /.box-header -->
                        @if( Auth::user()->type==1 || Auth::user()->type==2 )
                        <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped no-margin" id="dashboard_bookingss">
                                <thead>
                                    <tr>
                                        <th>{{__('messages.service')}}</th>
                                        <th>{{__('messages.customer')}}</th>
                                        <th>{{__('messages.status')}}</th>
                                        <th>{{__('messages.date')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($appointments as $appointment)
                                    <tr>
                                        <td>{{ucfirst($appointment->slots->employeeservices->services->title)}}</td>
                                        <td>{{ucfirst($appointment->users->name)}}</td>
                                        <td><span class="label label-{{$appointment->status==0 ? 'warning': 'success'}}">{{ $appointment->status==0 ? 'Pending': 'Confirmed' }}</span></td>
                                        <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">{{$appointment->booking_date}}</div>
                                        </td>
                                    </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">{{ __('messages.no_appointments_yet') }}</td>
                                            </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                        </div>
                        @endif
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            @if(Auth::user()->type==config('global.user_type.customer'))
                            <div style="height:216px;">
                              <a href="{{url('/')}}/appointments/book" class="btn btn-sm btn-info btn-flat pull-left" style="position: relative;top:185px;float: right;">{{__('messages.book_appointment')}}</a>
                            </div>
                            @endif
                            @if(Auth::user()->type==1)
                              <a href="{{url('/')}}/appointments/book" class="btn btn-sm btn-info btn-flat pull-left">{{__('messages.book_appointment')}}</a>
                              <a href="{{url('/')}}/appointments" class="btn btn-sm btn-default btn-flat pull-right">{{__('messages.view_all_bookings')}}</a>
                            @endif
                        </div>
                        <!-- /.box-footer -->
                    </div>
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">{{__('messages.top_employees')}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($employees as $employee)
                    <li>
                        <img src="{{ asset('images/') }}/{{$employee->profileimage!=''?$employee->profileimage:'user-tie.png'}}" alt="User Image">
                        <a class="users-list-name" href="#">{{ucwords($employee->name)}}</a>
                        <span class="users-list-date">{{($employee->updated_at)}}</span>
                    </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                @if(Auth::user()->type==1)
                <div class="box-footer text-center">
                    <a href="{{url('/')}}/employees" class="uppercase">{{__('messages.view_all_employees')}}</a>
                </div>
                @else
                    <div class="box-footer" style="height:41px;"></div>
                @endif
                <!-- /.box-footer -->
              </div>
              <!--/.box -->

            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{__('messages.top_rated_services')}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @forelse ($services as $service)
                <!-- item -->
                <li class="item">
                  <div class="product-img">
                    <img src="{{url('/')}}/images/service-check.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <span class="product-title text-blue">{{$service->title}}</span>
                    <span class="product-description">
                          {!! $service->description !!}
                    </span>
                  </div>
                </li>
                @empty
                    <li class="item">{{__('messages.no_service_yet')}}</li>
                @endforelse
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="{{url('/')}}/services" class="uppercase">{{__('messages.view_all_services')}}</a>
            </div>
            <!-- /.box-footer -->
          </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

@endsection
{!! Charts::scripts() !!}
{!! $chart->script() !!}
