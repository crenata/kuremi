@extends('admin.dashboard')

@section('title', 'Add Negara')

@section('content-header', 'Negara')

@section('sub-content-header', 'Add New Negara')

@section('breadcrumb')
	<li>
		<a href="{{ route('admin.home') }}">
			<i class="fa fa-dashboard"></i> Home
		</a>
	</li>
	<li>
		<a href="{{ route('negara.index') }}">
			<i class="fa fa-user"></i> Negara
		</a>
	</li>
	<li class="active">Add Negara</li>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				<div class="box box-info">
					<div class="box-header"></div>
					{{ Form::open(array('route' => 'negara.store', 'class' => 'form-horizontal')) }}
						<div class="box-body">
							<div class="form-group">
								{{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Negara Name')) }}
								</div>
							</div>
						</div> <!-- .box-body -->

						<div class="box-footer">
							{{ Html::linkRoute('negara.index', 'Cancel', array(), ['class' => 'btn btn-warning']) }}
							{{ Form::reset('Reset', array('class' => 'btn btn-danger')) }}
							{{ Form::submit('Submit', array('class' => 'btn btn-success pull-right')) }}
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection