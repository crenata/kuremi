@extends('admin.dashboard')

@section('title', 'Edit Musim')

@section('content-header', 'Musim')

@section('sub-content-header', 'Edit Musim')

@section('breadcrumb')
	<li>
		<a href="{{ route('admin.home') }}">
			<i class="fa fa-dashboard"></i> Home
		</a>
	</li>
	<li>
		<a href="{{ route('musim.index') }}">
			<i class="fa fa-bolt"></i> Musim
		</a>
	</li>
	<li class="active">Edit Musim</li>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				<div class="box box-info">
					<div class="box-header"></div>
					{{ Form::model($musim, array('route' => ['musim.update', $musim->id], 'method' => 'PUT', 'class' => 'form-horizontal')) }}
						<div class="box-body">
							<div class="form-group">
								{{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Musim Name')) }}
								</div>
							</div>
						</div> <!-- .box-body -->

						<div class="box-footer">
							{{ Html::linkRoute('musim.index', 'Cancel', array(), ['class' => 'btn btn-warning']) }}
							{{ Form::reset('Reset', array('class' => 'btn btn-danger')) }}
							{{ Form::submit('Submit', array('class' => 'btn btn-success pull-right')) }}
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection