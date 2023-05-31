@extends('admin.dashboard')

@section('title', 'Edit Album')

@section('content-header', 'Album')

@section('sub-content-header', 'Edit Album')

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
	<li class="active">Edit Album</li>
@endsection

@section('stylesheets')
	<style type="text/css">
		.trailer {
			max-width: 363px;
			height: auto;
		}
	</style>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="box box-info">
					<div class="box-header"></div>
					{{ Form::model($album, array('route' => ['album.update', $album->id], 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) }}
						<div class="box-body">
							<div class="form-group">
								{{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Album Name')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('sinopsis', 'Sinopsis', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::textarea('sinopsis', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Sinopsis')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label(null, null, array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									<img src="{{ $album->image_default }}" alt="" width="100" height="100">
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('image_default', 'Image Default', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::file('image_default', array('class' => 'form-control')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label(null, null, array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									<img src="{{ $album->image_banner }}" alt="" width="363" height="218">
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('image_banner', 'Image Banner', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::file('image_banner', array('class' => 'form-control')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('durasi', 'Durasi Per Episode', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-2">
									{{ Form::text('durasi', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Menit / Episode')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label(null, null, array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									<div class="trailer">
										<video controls playsinline id="player">
											<source src="{{ $album->trailer }}" type="">
										</video>
									</div>
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('trailer', 'Video Trailer', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::file('trailer', array('class' => 'form-control')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('release', 'Release', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::text('release', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Release Date')) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('produser', 'Produser', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::text('produser', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Produser Name')) }}
								</div>
							</div>

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
									{{ Form::select('status_id', $statuses, null, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('musim', 'Musim', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::select('musim_id', $musims, null, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('day', 'Jadwal', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::select('day_id', $days, null, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('genres', 'Genres', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::select('genres[]', $genres, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
								</div>
							</div>

							<div class="form-group">
								{{ Form::label('types', 'Types', array('class' => 'col-sm-2 control-label')) }}
								<div class="col-sm-9">
									{{ Form::select('types[]', $types, null, ['class' => 'form-control select2-multi-types', 'multiple' => 'multiple']) }}
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
									@if($album->is_approved)
										<input type="checkbox" name="is_approved" value="1" checked> Is Approved?
									@else
										<input type="checkbox" name="is_approved" value="0"> Is Approved?
									@endif	                                
	                                <!-- {{ Form::checkbox('is_approved', null) }} -->
	                            </label>
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
		$('.select2-multi').select2().val({!! json_encode($album->genres()->allRelatedIds()) !!}).trigger('change');
		$('.select2-multi-types').select2();
		$('.select2-multi-types').select2().val({!! json_encode($album->types()->allRelatedIds()) !!}).trigger('change');

		const player = new Plyr('#player');
	</script>
@endsection