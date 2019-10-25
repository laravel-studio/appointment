@extends('layouts.afterlogin.dashboard')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{-- Data Tables --}}
			{{__('messages.list')}}
			<small>
				{{-- advanced tables --}}
				{{ __('messages.all_services') }}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('messages.home') }}</a></li>
			<li class="active">{{ __('messages.services') }} </li>
		</ol>
	</section>

<section class="content">
	<div class="row">
	</div>
	<div class="row">
		<div class="col-xs-12">
            @include('services.flash-message')
			<div class="box">
                @if(Auth::user()->type == config('global.user_type.superadmin'))
				<div class="box-header">
					 <h3 class="box-title">{{ __('messages.all_services') }} </h3>
					<span style="float: right;"><a href="{{url('/')}}/services/create" class="btn btn-info">{{ __('messages.add_services') }} </a></span>
                </div>
                @endif
			<!-- /.box-header -->

			<div class="box-body">
				<table id="serviceslist" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>{{ __('messages.service_title') }}</th>
							<th>{{ __('messages.service_duration') }}</th>
							<th>{{ __('messages.service_description') }}</th>
							<th>{{ __('messages.service_terms') }}</th>
							<th>{{ __('messages.actions') }}</th>
						</tr>
					</thead>
					<tbody>

						@forelse ($services as $service)
							<tr>
								<td>{{ ucwords($service->title) }}</td>
								<td>{{ $service->duration }} {{__("Minute(s)")}}</td>
								<td>{!! $service->description !!}</td>
								<td>{!! $service->terms !!}</td>
								<td style="text-align:center;">
                                    @if(Auth::user()->type==1)
                                    <a href="{{ route('services.edit',$service->id) }}" style="padding-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true">	<span style="padding-left: 3px;">{{ __('messages.edit') }}</span></i></a>
								    <a href="" data-toggle="modal" onclick="deleteData('services',{{$service->id}})" style="padding-right: 10px;"><i class="fa fa-trash-o" aria-hidden="true">
										<span style="padding-left: 3px;">{{ __('messages.delete') }}</span></i>
                                    </a>
                                        @else
                                            <span class="label label-warning text-lg">{{__("Admin Only")}}</span>
                                    @endif
								</td>
							</tr>
							@empty
							<tr><td colspan="3"><p>{{ __('messages.no_more_services_for_now') }}</p></td></tr>
						@endforelse

					</tbody>
					<tfoot>
						<tr>
							<th>{{ __('messages.service_title') }}</th>
							<th>{{ __('messages.service_duration') }}</th>
							<th>{{ __('messages.service_description') }}</th>
							<th>{{ __('messages.service_terms') }}</th>
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
