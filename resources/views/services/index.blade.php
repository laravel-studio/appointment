@extends('layouts.afterlogin.dashboard')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{-- Data Tables --}}
			List 
			<small>
				{{-- advanced tables --}}
				{{ __('All Services') }}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>			
			<li class="active">{{ __('Services') }} </li>
		</ol>
	</section>
	
<section class="content">
	<div class="row">
		@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
		@endif
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					 <h3 class="box-title">{{ __('All Services') }} </h3> 
					<span style="float: right;"><a href="{{url('/')}}/services/create" class="btn btn-info">{{ __('Add Services') }} </a></span>
				</div>
			<!-- /.box-header -->

			<div class="box-body">
				<table id="serviceslist" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>{{ __('Services Title') }}</th>
							<th>{{ __('Services Duration') }}</th>
							<th>{{ __('Services Description') }}</th>
							<th>{{ __('Services Terms') }}</th>
							<th>{{ __('Actions') }}</th>
						</tr>
					</thead>
					<tbody>

						@forelse ($services as $service)
							<tr>
								<td>{{ $service->title }}</td>
								<td>{{ $service->duration }}</td>
								<td>{{ $service->description }}</td>
								<td>{{ $service->terms }}</td>
								<td>
									<a href="{{ route('services.edit',$service->id) }}" style="padding-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true">	<span style="padding-left: 3px;">{{ __('Edit') }}</span></i>
									</a>
								<a  href="" data-toggle="modal" onclick="deleteData('services',{{$service->id}})" style="padding-right: 10px;"><i class="fa fa-trash-o" aria-hidden="true">
										<span style="padding-left: 3px;">{{ __('Delete') }}</span></i>
									</a>
								</td>
							</tr>
							@empty
							<tr><td colspan="3"><p>{{ __('No services more for now.') }}</p></td></tr>
						@endforelse

					</tbody>
					<tfoot>
						<tr>
							<th>{{ __('Services Title') }}</th>
							<th>{{ __('Services Duration') }}</th>
							<th>{{ __('Services Description') }}</th>
							<th>{{ __('Services Terms') }}</th>
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