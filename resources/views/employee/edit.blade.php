    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{__('messages.edit_employee')}}
			<small>
			    {{__('messages.edit_employee_details')}}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{__('messages.home')}}</a></li>
			<li><a href="{{url('/')}}/employees">{{__('messages.employee')}}</a></li>
			<li class="active">{{__('messages.edit_employee')}}</li>
		</ol>
    </section>
    <section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					{{-- <h3 class="box-title">User</h3> --}}
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <form action="{{url('/')}}/employees/update/{{$employee->id}}" method="POST">
						@csrf
						@method('PATCH')
						<div class="form-group col-md-12">
						    <label for="name">{{__('messages.employee_name')}}</label>
						    <input type="text" name="name" class="form-control" id="name"  value="{{$employee->name}}">
						</div>
						<div class="form-group col-md-12">
						    <label for="name">{{__('messages.employee_email')}}</label>
						    <input type="text" name="email" class="form-control" id="email"  value="{{$employee->email}}" readonly>
						</div>
						<div class="form-group col-md-12">
						    <button type="submit" name="submit" class="btn btn-primary">{{__('messages.update_details')}}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
    </section>
</div>
@endsection
