@extends('layouts.afterlogin.dashboard')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{-- Data Tables --}}
			{{ __('List') }} 
			<small>
				{{-- advanced tables --}}
				{{ __('All Users') }}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
			
			<li class="active">{{ __('Users') }}</li>
		</ol>
	</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					 <h3 class="box-title">{{ __('All Users') }}</h3> 
					<span style="float: right;"><a href="{{url('/')}}/users/create" class="btn btn-info">{{ __('Add User') }}</a></span>
				</div>
			<!-- /.box-header -->
				@if ($message = Session::get('success'))
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
				@endif
			<div class="box-body">
				<table id="custlist" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>{{ __('User Name') }}</th>
							<th>{{ __('User Email') }}</th>
							<th>{{ __('Actions') }} </th>
						</tr>
					</thead>
					<tbody>

						@forelse ($users as $user)
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>
									<a href="users/edit/{{$user->id}}" style="padding-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true">	<span style="padding-left: 3px;">{{ __('Edit') }}</span></i>
									</a>
								<!--  -->
							
								<a  href="#" data-toggle="modal" onclick="deleteData('users',{{$user->id}})" style="padding-right: 10px;"><i class="fa fa-trash-o" aria-hidden="true">
									<span style="padding-left: 3px;">{{ __('Delete') }}</span></i>
								</a>
							
								</td>
							</tr>
							@empty
							<tr><td colspan="3"><p>{{ __('No users') }} </p></td></tr>
						@endforelse

					</tbody>
					<tfoot>
						<tr>
							<th>{{ __('User Name') }}</th>
							<th>{{ __('User Email') }}</th>
							<th>{{ __('Actions') }} </th>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.box-body -->
			</div>
		<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
@include('layouts.afterlogin.deletemodal')
</div>
@endsection