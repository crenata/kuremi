@extends('admin.dashboard')

@section('title', 'View Statuses')

@section('content-header', 'Status')
@section('sub-content-header', 'View All Statuses')

@section('breadcrumb')
	<li>
		<a href="{{ route('admin.home') }}">
			<i class="fa fa-dashboard"></i> Home
		</a>
	</li>
	<li>
		<a href="{{ route('status.index') }}">
			<i class="fa fa-signal"></i> Status
		</a>
	</li>
	<li class="active">View Statuses</li>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<div class="box">
					<div class="box-body">
						{{ $status->name }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection