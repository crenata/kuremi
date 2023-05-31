@extends('admin.dashboard')

@section('title', 'Add Album')

@section('content-header', 'Album')

@section('sub-content-header', 'Add New Album')

@section('breadcrumb')
	<li>
		<a href="{{ route('admin.home') }}">
			<i class="fa fa-dashboard"></i> Home
		</a>
	</li>
	<li>
		<a href="{{ route('album.index') }}">
			<i class="fa fa-suitcase"></i> Album
		</a>
	</li>
	<li class="active">Add Album</li>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-11">
				<div class="box box-info">
					<div class="box-header"></div>
					{{ Form::open(array('route' => 'album.store', 'files' => true, 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) }}
						<div class="box-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{{ Form::label('name', 'Name', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Album Name')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('sinopsis', 'Sinopsis', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::textarea('sinopsis', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Sinopsis')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('image_default', 'Image Default', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::file('image_default', array('class' => 'form-control', 'required' => '')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('image_banner', 'Image Banner', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::file('image_banner', array('class' => 'form-control', 'required' => '')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('durasi', 'Durasi Per Episode', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('durasi', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Menit / Episode')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('trailer', 'Video Trailer', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::file('trailer', array('class' => 'form-control', 'required' => '')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('release', 'Release', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::date('release', Carbon\Carbon::now(), array('class' => 'form-control', 'required' => '', 'placeholder' => 'Release Date')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('produser', 'Produser', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('produser', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Produser Name')) }}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{{ Form::label('rating', 'Rating', array('class' => 'col-sm-2 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('rating', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Rating Count')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('link_mal', 'Link MAL', array('class' => 'col-sm-2 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('link_mal', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'https://myanimelist.net/anime/')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('credit', 'Credit', array('class' => 'col-sm-2 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('credit', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Credit Name')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('status', 'Status', array('class' => 'col-sm-2 control-label')) }}
										<div class="col-sm-9">
											<select name="status_id" id="" class="form-control" required>
												@foreach($statuses as $status)
													<option value="{{ $status->id }}">{{ $status->name }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('musim', 'Musim', array('class' => 'col-sm-2 control-label')) }}
										<div class="col-sm-9">
											<select name="musim_id" id="" class="form-control" required>
												@foreach($musims as $musim)
													<option value="{{ $musim->id }}">{{ $musim->name }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('day', 'Jadwal', array('class' => 'col-sm-2 control-label')) }}
										<div class="col-sm-9">
											<select name="day_id" id="" class="form-control" required>
												@foreach($days as $day)
													<option value="{{ $day->id }}">{{ $day->name }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('genres', 'Genres', array('class' => 'col-sm-2 control-label')) }}
										<div class="col-sm-9">
											<select name="genres[]" id="" class="form-control select2-multi" multiple="multiple">
												@foreach($genres as $genre)
													<option value="{{ $genre->id }}">{{ $genre->name }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('types', 'Types', array('class' => 'col-sm-2 control-label')) }}
										<div class="col-sm-9">
											<select name="types[]" id="" class="form-control select2-multi-types" multiple="multiple">
												@foreach($types as $type)
													<option value="{{ $type->id }}">{{ $type->name }}</option>
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('keyword', 'Keyword', array('class' => 'col-sm-2 control-label')) }}
										<div class="col-sm-9">
											{{ Form::textarea('keyword', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Keyword')) }}
										</div>
									</div>

									<div class="checkbox">
										{{ Form::label(null, null, array('class' => 'col-sm-2 control-label')) }}
										<label>
			                                <input type="checkbox" name="is_approved" value="1" checked> Is Approved?
			                            </label>
									</div>
								</div>
							</div>
						</div> <!-- .box-body -->

						<div class="box-footer">
							{{ Html::linkRoute('album.index', 'Cancel', array(), ['class' => 'btn btn-warning']) }}
							{{ Form::reset('Reset', array('class' => 'btn btn-danger')) }}
							{{ Form::submit('Submit', array('class' => 'btn btn-success pull-right')) }}
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$('.select2-multi').select2();
		$('.select2-multi-types').select2();
	</script>
@endsection