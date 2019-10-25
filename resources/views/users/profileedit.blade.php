    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{ __('messages.profile_edit') }}
			<small>
			    {{ __('messages.edit_profile_details') }}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('messages.home') }} </a></li>
			<li><a href="{{url('/')}}/users">{{ __('messages.user') }}</a></li>
			<li class="active">{{ __('messages.edit_profile') }} </li>
		</ol>
	</section>
	<div class="row">
		<div class="col-xs-12">
			<section class="content">
				<div class="box col-md-12">
					<div class="box-header">
						 <h3 class="box-title">{{ __('messages.user') }}</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">

						<form action="{{ route('users.profileupdate',$user->id) }}" method="POST" enctype="multipart/form-data">

							{{ csrf_field() }}
							{{ method_field('patch') }}
							<div class="form-group">
							    <label for="name">{{ __('messages.profile_name') }}:</label>
							    <input type="text" name="name" class="form-control" id="name"  value="{{$user->name}}" >
							</div>
							<div class="form-group">
								@if($user->profileimage != '')
									<div class="priview">
										<img src="{{ asset('images/'.$user->profileimage) }}" class="img-thumbnail" height="150" width="150">
									</div>
								@endif
							    <label for="name">{{ __('messages.profile_image') }}:</label>
							    <input type="file" name="profileimage" class="form-control" id="profileimage" value="{{ asset('images/'.$user->profileimage) }}">
							</div>
							<div class="form-group">
							    <label for="name">{{ __('messages.new_password') }}:</label>
							    <input type="password" name="password" class="form-control" id="password" autocomplete="password">
							</div>
							<div class="form-group">
							    <label for="name">{{ __('messages.confirm_password') }}:</label>
							    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" autocomplete="password">
							</div>
							<div class="form-group">
							    <button type="submit" name="submit" class="btn btn-primary">{{ __('messages.update_details') }}</button>
							</div>
						</form>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
@endsection
