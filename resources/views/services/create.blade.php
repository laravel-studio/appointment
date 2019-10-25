    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{__('Add services') }}
			<small>
			    {{__('Add services details.') }}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
			<li><a href="{{url('/')}}/services">{{ __('Services') }} </a></li>
			<li class="active">{{ __('Add services') }}</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">{{ __('Services') }} </h3> 
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form action="{{ route('services.store') }}" method="POST">
							{{ csrf_field() }}
							
							<div class="form-group">
							    <label for="title">{{ __('Service Title') }} :</label>
							    <input type="text" name="title" class="form-control" id="title" placeholder="{{ __('Enter Service Title') }}">
							    @error('title')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>
							<div class="form-group">
							    <label for="name">{{ __('Service Description') }}:</label>						    
							    <textarea class="form-control" style="height:150px" name="description" placeholder="{{ __('Enter Service Description') }}"></textarea>
							    @error('description')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>
							<div class="form-group">
							    <label for="title">{{ __('Service Duration') }}:</label>
							    <input type="text" name="duration" class="form-control" id="duration" placeholder="{{ __('Enter Service Duration') }}" >
							    @error('duration')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>						
							<div class="form-group">
							    <label for="name">{{ __('Service Terms') }}:</label>						    
							    <textarea class="form-control" style="height:150px" name="terms" placeholder="{{ __('Enter Service Terms') }}"></textarea>
							    @error('terms')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>
							<div class="form-group">
							    <button type="submit" name="submit" class="btn btn-primary">{{ __('Add Service') }}</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
