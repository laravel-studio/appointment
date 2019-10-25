@extends('layouts.afterlogin.dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <h1>
            {{ __('Reports') }}
            <small>
                {{ __('view reports by different aspects.') }}
            </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
            <li><a href="{{url('/')}}/appointments"> {{ __('Appointments') }}</a></li>
            <li class="active">{{ __('Reports') }}</li>
        </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="row col-md-12">
                                <div class="form-group col-md-12">
                                    <label>View Reports By:</label>
                                    <select name="report_by" id="report_by" class="form-control">
                                        <option value="">Select</option>
                                        @foreach($attributes as $key=>$value)
                                            <option value="{{$value}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="report-details"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
@endsection
