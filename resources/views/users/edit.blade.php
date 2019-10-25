    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{ __('messages.edit_user') }}
			<small>
			    {{ __('messages.edit_user_details') }}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('messages.home') }} </a></li>
			<li><a href="{{url('/')}}/users">{{ __('messages.user') }}</a></li>
			<li class="active">{{ __('messages.edit_user') }} </li>
		</ol>
	</section>
	<div class="row">
		<div class="col-xs-12">
            <section class="content">
			<div class="box">
				<div class="box-header">
					 <h3 class="box-title col-md-12">{{ __('messages.edit_user') }}</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{ route('users.update',$user->id) }}" method="POST">

						{{ csrf_field() }}
						{{ method_field('patch') }}
						<div class="form-group col-md-12">
						    <label for="name">{{ __('messages.user_name') }}:</label>
						    <input type="text" name="name" class="form-control" id="name"  value="{{$user->name}}" >
						</div>
						<div class="form-group col-md-12">
						    <label for="name">{{ __('messages.user_email') }}:</label>
						    <input type="text" name="email" class="form-control" id="email"  value="{{$user->email}}" readonly="readonly">
						</div>
						<div class="form-group col-md-12">
						    <label for="name">{{ __('messages.new_password') }}:</label>
						    <input type="password" name="password" class="form-control" id="password" autocomplete="password">
						</div>
						<div class="form-group col-md-12">
						    <label for="name">{{ __('messages.confirm_password') }}:</label>
						    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" autocomplete="password">
						</div>
						<div class="form-group col-md-12">
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
