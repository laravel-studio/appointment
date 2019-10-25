    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{ __('Profile Edit') }} 
			<small>
			    {{ __('edit profile details') }} 
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('Home') }} </a></li>
			<li><a href="{{url('/')}}/users">{{ __('User') }}</a></li>
			<li class="active">{{ __('Edit Profile') }} </li>
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

					<form action="{{ route('users.profileupdate',$user->id) }}" method="POST" enctype="multipart/form-data">
						
						{{ csrf_field() }}
						{{ method_field('patch') }}
						<div class="form-group">
						    <label for="name">{{ __('Profile Name') }}:</label>
						    <input type="text" name="name" class="form-control" id="name"  value="{{$user->name}}" >
						</div>
						<div class="form-group">
							@if($user->profileimage != '')
								<div class="priview">
									<img src="{{ asset('images/'.$user->profileimage) }}" class="">
								</div>
							@endif
						    <label for="name">{{ __('Profile Image') }}:</label>
						    <input type="file" name="profileimage" class="form-control" id="profileimage" value="{{ asset('images/'.$user->profileimage) }}">
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
