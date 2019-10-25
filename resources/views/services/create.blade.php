    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{__('messages.add_services') }}
			<small>
			    {{__('messages.add_services_details') }}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('messages.home') }}</a></li>
			<li><a href="{{url('/')}}/services">{{ __('messages.services') }} </a></li>
			<li class="active">{{ __('messages.add_services') }}</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form action="{{ route('services.store') }}" method="POST">
							{{ csrf_field() }}

							<div class="form-group col-md-12">
							    <label for="title">{{ __('messages.service_title') }} :</label>
							    <input type="text" name="title" class="form-control" id="title" placeholder="{{ __('Enter Service Title') }}">
							    @error('title')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>
							<div class="form-group col-md-12">
							    <label for="name">{{ __('messages.service_description') }}:</label>
							    <textarea class="form-control" style="height:150px" name="description" id="service_description"></textarea>
							    @error('description')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>
							<div class="form-group col-md-12">
							    <label for="title">{{ __('messages.service_duration') }}:</label>
							    <input type="text" name="duration" class="form-control" id="duration" placeholder="{{ __('messages.enter_service_duration') }}" >
							    @error('duration')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>
							<div class="form-group col-md-12">
							    <label for="name">{{ __('messages.service_terms') }}:</label>
							    <textarea class="form-control" style="height:150px" name="terms" id="service_terms"></textarea>
							    @error('terms')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>
							<div class="form-group col-md-12">
							    <button type="submit" name="submit" class="btn btn-primary">{{ __('messages.add_services') }}</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
