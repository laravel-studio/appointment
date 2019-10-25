    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{ __('messages.edit_services') }}
			<small>
			   {{ __('messages.edit_services_details') }}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('messages.home') }}</a></li>
			<li><a href="{{url('/')}}/services">{{ __('messages.services') }}</a></li>
			<li class="active">{{ __('messages.edit_services') }}</li>
		</ol>
    </section>
    <section class="content">
	<div class="row">
		@if ($errors->any())
			<div class="alert alert-danger">
			<strong>{{ __('messages.whoops') }}</strong> {{ __('messages.there_were_some_problems_with_your_input') }}<br><br>
			<ul>
			    @foreach ($errors->all() as $error)
			        <li>{{ $error }}</li>
			    @endforeach
			</ul>
			</div>
		@endif
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
				 	<h3 class="box-title col-md-12">{{ __('messages.services') }}</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{ route('services.update',$service->id) }}" method="POST">

						{{ csrf_field() }}
						{{ method_field('patch') }}
							<div class="form-group col-md-12">
							    <label for="title">{{ __('messages.service_title') }} :</label>
							    <input type="text" name="title" class="form-control" id="title" value="{{ $service->title }}">
							    @error('title')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>

							<div class="form-group col-md-12">
							    <label for="name">{{ __('messages.service_description') }}:</label>
							    <textarea class="form-control" style="height:150px" name="description" id="editServiceDescription">{{ $service->description }}</textarea>
							    @error('description')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>

							<div class="form-group col-md-12">
							    <label for="title">{{ __('messages.service_duration') }}:</label>
							    <input type="text" name="duration" class="form-control" id="duration" value="{{ $service->duration }}">
							    @error('duration')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>

							<div class="form-group col-md-12">
							    <label for="name">{{ __('messages.service_terms') }}:</label>
							    <textarea class="form-control" style="height:150px" name="terms" id="editServiceTerms">{{ $service->terms }}</textarea>
							    @error('terms')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>

						<div class="form-group col-md-12">
						    <button type="submit" name="submit" class="btn btn-primary">{{ __('messages.update_details') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
    </section>
</div>
@endsection
