    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{ __('messages.add_user') }}
			<small>
			    {{ __('messages.add_user_details') }}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('messages.home') }}</a></li>
			<li><a href="{{url('/')}}/users">{{ __('messages.user') }}</a></li>
			<li class="active">{{ __('messages.add_user') }}</li>
		</ol>
	</section>
	<div class="row">
        <section class="content">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title col-md-12">{{ __('messages.user') }}</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{route('save')}}" method="POST">
						{{ csrf_field() }}

						<div class="form-group col-md-12">
						    <label for="name">{{ __('messages.user_name') }}:</label>
						    <input type="text" name="name" class="form-control" id="name" >
						    @error('name')
	                           <span class="invalid-feedback text-danger" role="alert">
	                               <strong>{{ $message }}</strong>
	                           </span>
	                       @enderror
						</div>
						<div class="form-group col-md-12">
						    <label for="name">{{ __('messages.user_email') }}:</label>
						    <input type="text" name="email" class="form-control" id="email" >
						    @error('email')
	                           <span class="invalid-feedback text-danger" role="alert">
	                               <strong>{{ $message }}</strong>
	                           </span>
	                       @enderror
						</div>
						<div class="form-group col-md-12">
						    <label for="name">{{ __('messages.new_password') }}:</label>
						    <input type="password" name="password" class="form-control" id="password" >
						    @error('password')
	                           <span class="invalid-feedback text-danger" role="alert">
	                               <strong>{{ $message }}</strong>
	                           </span>
	                       @enderror
						</div>
						<div class="form-group col-md-12">
						    <label for="name">{{ __('messages.confirm_password') }}:</label>
						    <input type="password" name="password_confirmation" class="form-control" >
						</div>
						<div class="form-group col-md-12">
						    <button type="submit" name="submit" class="btn btn-primary">{{ __('messages.add_user') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
    </section>
</div>
@endsection
