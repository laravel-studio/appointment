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
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('messages.home') }}</a></li>
            <li class="active">{{ __('messages.slots') }}</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @include('slot.flash-message')
                <div class="box">
                @if(Auth::user()->type==config('global.user_type.superadmin'))
                <div class="box-header">
                    <span style="float: right;"><a href="{{url('/')}}/slots/create" class="btn btn-info">{{__('messages.add_slot')}}</a></span>
                </div>
                @endif
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="slotlist" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('messages.service_name') }}</th>
                            <th>{{ __('messages.employee_name') }}</th>
                            <th>{{__('messages.day')}}</th>
                            <th>{{__('messages.price')}}</th>
                            <th>{{__('messages.start_time')}}</th>
                            <th>{{__('messages.end_time')}}</th>
                            <th>{{ __('messages.actions') }}</th>
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
                                        @if(Auth::user()->type==config('global.user_type.superadmin'))
                                        <a href="{{url('/')}}/slots/{{$slot->id}}/edit" style="padding-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true"><span style="padding-left: 3px;">{{__('messages.edit')}}</span></i></a>
                                        {{-- <a href="" data-toggle="modal" onclick="deleteData('slots',{{$slot->id}})" style="padding-right: 10px;"><i class="fa fa-trash-o" aria-hidden="true"><span style="padding-left: 3px;">{{__('messages.delete')}}</span></i></a> --}}
                                        @else 
                                        <span class="label label-warning text-lg">{{__("Admin Only")}}</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                    <tr><td colspan="6">{{ __('messages.no_slots_added_yet') }}</td></tr>
                            @endforelse

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('messages.service_name') }}</th>
                            <th>{{ __('messages.employee_name') }}</th>
                            <th>{{__('messages.day')}}</th>
                            <th>{{__('messages.price')}}</th>
                            <th>{{__('messages.start_time')}}</th>
                            <th>{{__('messages.end_time')}}</th>
                            <th>{{ __('messages.actions') }}</th>
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
