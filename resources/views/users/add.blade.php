    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{ __('Add User') }} 
			<small>
			    {{ __('Add user details.') }}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
			<li><a href="{{url('/')}}/users">{{ __('User') }}</a></li>
			<li class="active">{{ __('Add User') }}</li>
		</ol>
	</section>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">{{ __('User') }}</h3> 
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{route('save')}}" method="POST">
						{{ csrf_field() }}
						
						<div class="form-group">
						    <label for="name">{{ __('User Name') }}:</label>
						    <input type="text" name="name" class="form-control" id="name" >
						    @error('name')
	                           <span class="invalid-feedback text-danger" role="alert">
	                               <strong>{{ $message }}</strong>
	                           </span>
	                       @enderror
						</div>
						<div class="form-group">
						    <label for="name">{{ __('User Email') }}:</label>
						    <input type="text" name="email" class="form-control" id="email" >
						    @error('email')
	                           <span class="invalid-feedback text-danger" role="alert">
	                               <strong>{{ $message }}</strong>
	                           </span>
	                       @enderror
						</div>
						<div class="form-group">
						    <label for="name">{{ __('New Password') }}:</label>
						    <input type="password" name="password" class="form-control" id="password" >
						    @error('password')
	                           <span class="invalid-feedback text-danger" role="alert">
	                               <strong>{{ $message }}</strong>
	                           </span>
	                       @enderror
						</div>
						<div class="form-group">
						    <label for="name">{{ __('Confirm Password') }}:</label>
						    <input type="password" name="password_confirmation" class="form-control" >
						</div>
						<div class="form-group">
						    <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
