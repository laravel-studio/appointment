    @extends('layouts.afterlogin.dashboard')
    <!-- Main content -->
    @section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Edit Employee
			<small>
			    edit employee details.
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="{{url('/')}}/employees">Employee</a></li>
			<li class="active">Edit Employee</li>
		</ol>
	</section>
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
						<div class="form-group">
						    <label for="name">Employee Name:</label>
						    <input type="text" name="name" class="form-control" id="name"  value="{{$employee->name}}">
						</div>
						<div class="form-group">
						    <label for="name">Employee Email:</label>
						    <input type="text" name="email" class="form-control" id="email"  value="{{$employee->email}}" readonly>
						</div>
						<div class="form-group">
						    <button type="submit" name="submit" class="btn btn-primary">Update Details</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
