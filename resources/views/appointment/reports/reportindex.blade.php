@extends('layouts.afterlogin.dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{ __('messages.reports') }}
            <small>
                {{ __('messages.view_reports_by_diffrent_aspects') }}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('messages.home') }}</a></li>
            <li><a href="{{url('/')}}/appointments"> {{ __('messages.appointments') }}</a></li>
            <li class="active">{{ __('messages.reports') }}</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">

                            </div>
                            <div class="box-body">
                                <div class="row col-md-12">
                                    <div class="form-group col-md-12">
                                        <label for="reportRangeDetails">{{__('messages.select_range')}}</label><br>
                                        <input type="text" id="reportRangeDetails" name="reportRangeDetails" class="form-control">
                                    </div>
                                </div>
                                <div class="report-details"></div>
                            </div>
                        </div>
                    </div>
                <!-- /.box -->
                </div>
            </div>
                <!-- /.col -->
            <!-- /.row -->
        </section>
    </div>
@endsection
