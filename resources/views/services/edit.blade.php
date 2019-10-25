    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{ __('Edit Services') }}
			<small>
			   {{ __('edit services details.') }} 
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
			<li><a href="{{url('/')}}/services">{{ __('Services') }}</a></li>
			<li class="active">{{ __('Edit Services') }}</li>
		</ol>
	</section>
	<div class="row">
		@if ($errors->any())
			<div class="alert alert-danger">
			<strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
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
				 	<h3 class="box-title">{{ __('Services') }}</h3> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{ route('services.update',$service->id) }}" method="POST">
						
						{{ csrf_field() }}
						{{ method_field('patch') }}
							<div class="form-group">
							    <label for="title">{{ __('Service Title') }} :</label>
							    <input type="text" name="title" class="form-control" id="title" value="{{ $service->title }}">
							    @error('title')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>

							<div class="form-group">
							    <label for="name">{{ __('Service Description') }}:</label>						    
							    <textarea class="form-control" style="height:150px" name="description">{{ $service->description }}</textarea>
							    @error('description')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>

							<div class="form-group">
							    <label for="title">{{ __('Service Duration') }}:</label>
							    <input type="text" name="duration" class="form-control" id="duration" value="{{ $service->duration }}">
							    @error('duration')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>	

							<div class="form-group">
							    <label for="name">{{ __('Service Terms') }}:</label>						    
							    <textarea class="form-control" style="height:150px" name="terms">{{ $service->terms }}</textarea>
							    @error('terms')
		                           <span class="invalid-feedback text-danger" role="alert">
		                               <strong>{{ $message }}</strong>
		                           </span>
		                       @enderror
							</div>
						
						<div class="form-group">
						    <button type="submit" name="submit" class="btn btn-primary">{{ __('Update Details') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
