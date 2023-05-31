@extends('admin.dashboard')

@section('title', 'Edit Status')

@section('content-header', 'Status')

@section('sub-content-header', 'Edit Status')

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
	<li class="active">Edit Status</li>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				<div class="box box-info">
					<div class="box-header"></div>
					{{ Form::model($status, array('route' => ['status.update', $status->id], 'method' => 'PUT', 'class' => 'form-horizontal')) }}
						<div class="box-body">
							<div class="form-group">
								{{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Status Name')) }}
								</div>
							</div>
						</div> <!-- .box-body -->

						<div class="box-footer">
							{{ Html::linkRoute('status.index', 'Cancel', array(), ['class' => 'btn btn-warning']) }}
							{{ Form::reset('Reset', array('class' => 'btn btn-danger')) }}
							{{ Form::submit('Submit', array('class' => 'btn btn-success pull-right')) }}
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection