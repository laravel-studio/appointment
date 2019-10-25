@extends('layouts.afterlogin.dashboard')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			{{-- Data Tables --}}
			{{ __('messages.list') }}
			<small>
				{{-- advanced tables --}}
				{{ __('messages.all_users') }}
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> {{ __('messages.home') }}</a></li>

			<li class="active">{{ __('messages.user') }}</li>
		</ol>
	</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
            @include('users.flash-message')
			<div class="box">
				<div class="box-header">
					 <h3 class="box-title">{{ __('messages.all_users') }}</h3>
					<span style="float: right;"><a href="{{url('/')}}/users/create" class="btn btn-info">{{ __('messages.add_user') }}</a></span>
				</div>
			<!-- /.box-header -->
                @if($users != '')
                <div class="col-md-12">
                    <span><a href="{{url('/')}}/users/export" class="btn btn-success"><i class="fa fa-table" aria-hidden="true" style="padding-right:7px;"></i>{{__('messages.export_as_excel')}}</a></span>
                </div>
                @endif
                <div class="box-body">
				<table id="custlist" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>{{ __('messages.user_name') }}</th>
							<th>{{ __('messages.user_email') }}</th>
							<th>{{ __('messages.actions') }} </th>
						</tr>
					</thead>
					<tbody>

						@forelse ($users as $user)
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>
									<a href="users/edit/{{$user->id}}" style="padding-right: 10px;"><i class="fa fa-pencil-square-o" aria-hidden="true">	<span style="padding-left: 3px;">{{ __('messages.edit') }}</span></i>
									</a>
								<!--  -->

								<a  href="#" data-toggle="modal" onclick="deleteData('users',{{$user->id}})" style="padding-right: 10px;"><i class="fa fa-trash-o" aria-hidden="true">
									<span style="padding-left: 3px;">{{ __('messages.delete') }}</span></i>
								</a>

								</td>
							</tr>
							@empty
							<tr><td colspan="3"><p>{{ __('messages.no_users') }} </p></td></tr>
						@endforelse

					</tbody>
					<tfoot>
						<tr>
							<th>{{ __('messages.user_name') }}</th>
							<th>{{ __('messages.user_email') }}</th>
							<th>{{ __('messages.actions') }} </th>
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
