    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{ __('Edit User') }} 
			<small>
			    {{ __('edit user details') }} 
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('Home') }} </a></li>
			<li><a href="{{url('/')}}/users">{{ __('User') }}</a></li>
			<li class="active">{{ __('Edit User') }} </li>
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
					<form action="{{ route('users.update',$user->id) }}" method="POST">
						
						{{ csrf_field() }}
						{{ method_field('patch') }}
						<div class="form-group">
						    <label for="name">{{ __('User Name') }}:</label>
						    <input type="text" name="name" class="form-control" id="name"  value="{{$user->name}}" >
						</div>
						<div class="form-group">
						    <label for="name">{{ __('User Email') }}:</label>
						    <input type="text" name="email" class="form-control" id="email"  value="{{$user->email}}" readonly="readonly">
						</div>
						<div class="form-group">
						    <label for="name">{{ __('New Password') }}:</label>
						    <input type="password" name="password" class="form-control" id="password" autocomplete="password">
						</div>
						<div class="form-group">
						    <label for="name">{{ __('Confirm Password') }}:</label>
						    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" autocomplete="password">
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
