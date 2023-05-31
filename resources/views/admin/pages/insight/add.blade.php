@extends('admin.dashboard')

@section('title', 'Add Insight')

@section('content-header', 'Insight')

@section('sub-content-header', 'Add New Insight')

@section('breadcrumb')
	<li>
		<a href="{{ route('admin.home') }}">
			<i class="fa fa-dashboard"></i> Home
		</a>
	</li>
	<li>
		<a href="{{ route('insight.index') }}">
			<i class="fa fa-suitcase"></i> Insight
		</a>
	</li>
	<li class="active">Add Insight</li>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-11">
				<div class="box box-info">
					<div class="box-header"></div>
					{{ Form::open(array('route' => 'insight.store', 'files' => true, 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) }}
						<div class="box-body">
							<div class="form-group">
								{{ Form::label('album', 'Album', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									<select name="album_id" id="" class="form-control" required>
										@foreach($albums as $album)
											<option value="{{ $album->id }}">{{ $album->name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('name_anime_character', 'Name Anime Character', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::text('name_anime_character', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Name Anime Character')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('image_anime_character', 'Image Anime Character', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::file('image_anime_character', array('class' => 'form-control', 'required' => '')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('peran_id', 'Anime Peran', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									<select name="peran_id" id="" class="form-control" required>
										@foreach($perans as $peran)
											<option value="{{ $peran->id }}">{{ $peran->name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('name_orang', 'Name Pemeran', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::text('name_orang', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Name Pemeran')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('image_orang', 'Image Orang', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::file('image_orang', array('class' => 'form-control', 'required' => '')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('negara_id', 'Negara', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									<select name="negara_id" id="" class="form-control" required>
										@foreach($negaras as $negara)
											<option value="{{ $negara->id }}">{{ $negara->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div> <!-- .box-body -->

						<div class="box-footer">
							{{ Html::linkRoute('insight.index', 'Cancel', array(), ['class' => 'btn btn-warning']) }}
							{{ Form::reset('Reset', array('class' => 'btn btn-danger')) }}
							{{ Form::submit('Submit', array('class' => 'btn btn-success pull-right')) }}
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
