@extends('admin.dashboard')

@section('title', 'Edit Video')

@section('content-header', 'Video')

@section('sub-content-header', 'Edit Video')

@section('breadcrumb')
	<li>
		<a href="{{ route('admin.home') }}">
			<i class="fa fa-dashboard"></i> Home
		</a>
	</li>
	<li>
		<a href="{{ route('video.index') }}">
			<i class="fa fa-video-camera"></i> Video
		</a>
	</li>
	<li class="active">Edit Video</li>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-11">
				<div class="box box-info">
					<div class="box-header"></div>
					{{ Form::model($video, array('route' => ['video.update', $video->id], 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) }}
						<div class="box-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										{{ Form::label('album', 'Album', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::select('album_id', $albums, null, ['class' => 'form-control']) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('name', 'Name', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'placeholder' => 'Video Name')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('subtitle', 'Subtitle File', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::file('subtitle', array('class' => 'form-control')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('st_240p', 'Streaming 240p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('video_240p', 'Video 240p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::file('video_240p', array('class' => 'form-control')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('url_240p', 'Url 240p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('url_240p', null, array('class' => 'form-control', 'placeholder' => 'https://link-url-video-240p')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('st_360p', 'Streaming 360p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('video_360p', 'Video 360p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::file('video_360p', array('class' => 'form-control')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('url_360p', 'Url 360p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('url_360p', null, array('class' => 'form-control', 'placeholder' => 'https://link-url-video-360p')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('st_480p', 'Streaming 480p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('video_480p', 'Video 480p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::file('video_480p', array('class' => 'form-control')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('url_480p', 'Url 480p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('url_480p', null, array('class' => 'form-control', 'placeholder' => 'https://link-url-video-480p')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('st_720p', 'Streaming 720p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('video_720p', 'Video 720p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::file('video_720p', array('class' => 'form-control')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('url_720p', 'Url 720p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('url_720p', null, array('class' => 'form-control', 'placeholder' => 'https://link-url-video-720p')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('st_1080p', 'Streaming 1080p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('video_1080p', 'Video 1080p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::file('video_1080p', array('class' => 'form-control')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('url_1080p', 'Url 1080p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('url_1080p', null, array('class' => 'form-control', 'placeholder' => 'https://link-url-video-1080p')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('360p', 'Download 360p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_gd_360p', 'GD 360p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_gd_360p', null, array('class' => 'form-control', 'placeholder' => 'https://drive.google.com/file/d/1adi3uqiI98wGwus23fs/view?usp=drive_open')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_zs_360p', 'ZS 360p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_zs_360p', null, array('class' => 'form-control', 'placeholder' => 'https://www22.zippyshare.com/v/Ci09Hib/file.html')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_sf_360p', 'SF 360p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_sf_360p', null, array('class' => 'form-control', 'placeholder' => 'https://www.solidfiles.com/')) }}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										{{ Form::label('download_rc_360p', 'RC 360p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_rc_360p', null, array('class' => 'form-control', 'placeholder' => 'https://racaty.com/t93qhb8a72')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_kr_360p', 'KR 360p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_kr_360p', null, array('class' => 'form-control', 'placeholder' => 'https://cloud.kuremi.com/t93qhb8a72')) }}
										</div>
									</div>
									
									<div class="form-group">
										{{ Form::label('480p', 'Download 480p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_gd_480p', 'GD 480p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_gd_480p', null, array('class' => 'form-control', 'placeholder' => 'https://drive.google.com/file/d/1adi3uqiI98wGwus23fs/view?usp=drive_open')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_zs_480p', 'ZS 480p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_zs_480p', null, array('class' => 'form-control', 'placeholder' => 'https://www22.zippyshare.com/v/Ci09Hib/file.html')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_sf_480p', 'SF 480p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_sf_480p', null, array('class' => 'form-control', 'placeholder' => 'https://www.solidfiles.com/')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_rc_480p', 'RC 480p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_rc_480p', null, array('class' => 'form-control', 'placeholder' => 'https://racaty.com/t93qhb8a72')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_kr_480p', 'KR 480p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_kr_480p', null, array('class' => 'form-control', 'placeholder' => 'https://cloud.kuremi.com/t93qhb8a72')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('720p', 'Download 720p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_gd_720p', 'GD 720p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_gd_720p', null, array('class' => 'form-control', 'placeholder' => 'https://drive.google.com/file/d/1adi3uqiI98wGwus23fs/view?usp=drive_open')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_zs_720p', 'ZS 720p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_zs_720p', null, array('class' => 'form-control', 'placeholder' => 'https://www22.zippyshare.com/v/Ci09Hib/file.html')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_sf_720p', 'SF 720p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_sf_720p', null, array('class' => 'form-control', 'placeholder' => 'https://www.solidfiles.com/')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_rc_720p', 'RC 720p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_rc_720p', null, array('class' => 'form-control', 'placeholder' => 'https://racaty.com/t93qhb8a72')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_kr_720p', 'KR 720p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_kr_720p', null, array('class' => 'form-control', 'placeholder' => 'https://cloud.kuremi.com/t93qhb8a72')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('1080p', 'Download 1080p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_gd_1080p', 'GD 1080p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_gd_1080p', null, array('class' => 'form-control', 'placeholder' => 'https://drive.google.com/file/d/1adi3uqiI98wGwus23fs/view?usp=drive_open')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_zs_1080p', 'ZS 1080p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_zs_1080p', null, array('class' => 'form-control', 'placeholder' => 'https://www22.zippyshare.com/v/Ci09Hib/file.html')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_sf_1080p', 'SF 1080p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_sf_1080p', null, array('class' => 'form-control', 'placeholder' => 'https://www.solidfiles.com/')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_rc_1080p', 'RC 1080p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_rc_1080p', null, array('class' => 'form-control', 'placeholder' => 'https://racaty.com/t93qhb8a72')) }}
										</div>
									</div>

									<div class="form-group">
										{{ Form::label('download_kr_1080p', 'KR 1080p', array('class' => 'col-sm-3 control-label')) }}
										<div class="col-sm-9">
											{{ Form::text('download_kr_1080p', null, array('class' => 'form-control', 'placeholder' => 'https://cloud.kuremi.com/t93qhb8a72')) }}
										</div>
									</div>
									
									<div class="checkbox">
										{{ Form::label(null, null, array('class' => 'col-sm-2 control-label')) }}
										<label>
											@if($video->is_approved)
												<input type="checkbox" name="is_approved" value="1" checked> Is Approved?
											@else
												<input type="checkbox" name="is_approved" value="0"> Is Approved?
											@endif	                                
			                                <!-- {{ Form::checkbox('is_approved', null) }} -->
			                            </label>
									</div>
								</div>
							</div>
						</div> <!-- .box-body -->

						<div class="box-footer">
							{{ Html::linkRoute('video.index', 'Cancel', array(), ['class' => 'btn btn-warning']) }}
							{{ Form::reset('Reset', array('class' => 'btn btn-danger')) }}
							{{ Form::submit('Submit', array('class' => 'btn btn-success pull-right')) }}
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection