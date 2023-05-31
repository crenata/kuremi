@extends('main')

@section('title', '{{ $album->name }}')

@section('stylesheets')
	{{ Html::style('public/css/pages/album/view.css') }}
@endsection

@section('content')
@endsection

@section('content-container')
	<div class="row">
		<div class="col-md-8">
			<div class="box-content">
				<h3>{{ $album->name }}</h3>
				<div class="line">
					<div class="left-line"></div>
					<div class="center-line"></div>
					<div class="right-line"></div>
				</div>
				<div class="banner">
					<img src="{{ $album->image_banner }}" alt="" width="450" height="253" class="img-banner">
					<img src="{{ $album->image_default }}" alt="" width="160" height="220" class="img-default">
				</div>

				<h6>Trailer :</h6>
				<div class="single-line"></div>
				<div class="trailer">
					<video controls playsinline id="player">
						<source src="{{ $album->trailer }}" type="">
					</video>
				</div>

				<div class="description">
					<h6>Description :</h6>
					<div class="single-line"></div>
					<table>
						<tbody>
							<tr>
								<td>Judul</td>
								<td>:</td>
								<td>{{ $album->name }}</td>
							</tr>
							<tr class="spacing"></tr>
							<tr>
								<td>Durasi Per Episode</td>
								<td>:</td>
								<td>{{ $album->durasi }}</td>
							</tr>
							<tr class="spacing"></tr>
							<tr>
								<td>Release</td>
								<td>:</td>
								<td>{{ date('D, j F Y', strtotime($album->release)) }}</td>
							</tr>
							<tr class="spacing"></tr>
							<tr>
								<td>Genre</td>
								<td>:</td>
								<td>
									@foreach($album->genres as $genre)
										@if($loop->last)
											<a href="{{ route('user.genre.show', $genre->slug) }}">{{ $genre->name }}</a>
										@else
											<a href="{{ route('user.genre.show', $genre->slug) }}">{{ $genre->name }}</a><span> , </span>
										@endif
									@endforeach
								</td>
							</tr>
							<tr class="spacing"></tr>
							<tr>
								<td>Musim</td>
								<td>:</td>
								<td>{{ $album->musim->name }}</td>
							</tr>
							<tr class="spacing"></tr>
							<tr>
								<td>Type</td>
								<td>:</td>
								<td>
									@foreach($album->types as $type)
										@if($loop->last)
											<a href="{{ route('user.type.show', $type->slug) }}">{{ $type->name }}</a>
										@else
											<a href="{{ route('user.type.show', $type->slug) }}">{{ $type->name }}</a><span> , </span>
										@endif
									@endforeach
								</td>
							</tr>
							<tr class="spacing"></tr>
							<tr>
								<td>Produser</td>
								<td>:</td>
								<td>{{ $album->produser }}</td>
							</tr>
							<tr class="spacing"></tr>
							<tr>
								<td>Rating</td>
								<td>:</td>
								<td>{{ $album->rating }} [<a href="{{ $album->link_mal }}" target="_blank">MAL</a>]</td>
							</tr>
							<tr class="spacing"></tr>
							<tr>
								<td>Credit</td>
								<td>:</td>
								<td>{{ $album->credit }}</td>
							</tr>
							<tr class="spacing"></tr>
						</tbody>
					</table>
				</div> <!-- .description -->

				<div class="sinopsis">
					<h6>Sinopsis :</h6>
					<div class="single-line"></div>
					<p>{{ $album->sinopsis }}</p>
				</div> <!-- .sinopsis -->

				<div class="insight">
					<h6>Characters & Voice Actors</h6>
					<div class="single-line"></div>
					<div class="insight-content">
						<table>
							@foreach($album->insights as $insight)
								<tr>
									<td>
										<img src="{{ $insight->image_anime_character }}" alt="" width="34" height="45">
									</td>
									<td>
										<a href="#">{{ $insight->name_anime_character }}</a>
										<div class="letter-spacing">
											<small>{{ $insight->peran->name }}</small>
										</div>
									</td>
									<td></td>
									<td>
										<a href="#">{{ $insight->name_orang }}</a>
										<div class="letter-spacing">
											<small>{{ $insight->negara->name }}</small>
										</div>
									</td>
									<td>
										<img src="{{ $insight->image_orang }}" alt="" width="34" height="45">
									</td>
								</tr>
							@endforeach
						</table>
						<div class="clear"></div>
					</div>
				</div>

				<div class="episode">
					<h6>Episode :</h6>
					<div class="single-line"></div>
					<ul>
						@foreach($album->videos as $video)
							<li>
								<a href="{{ route('user.video.show', $video->slug) }}">{{ $video->name }}</a>
							</li>
						@endforeach
					</ul>
				</div> <!-- .episode -->

				<div class="download">
					<h6>Download :</h6>
					<div class="single-line"></div>
					@auth
						<ul>
							<li>
								@foreach($album->videos as $video)
									<h6>{{ $video->name }}</h6>
									<ul>
										@foreach(array('360p', '480p', '720p', '1080p') as $quality)
											<li>
												<div class="content-download">
													<blockquote>{{ $quality }}</blockquote>
													<div class="links">
														@if($quality == '360p')
															@if($video->download_gd_360p != null || $video->download_gd_360p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_gd_360p)) }}" target="_blank">GD</a>
															@endif
															@if($video->download_zs_360p != null || $video->download_zs_360p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_zs_360p)) }}" target="_blank">ZS</a>
															@endif
															@if($video->download_sf_360p != null || $video->download_sf_360p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_sf_360p)) }}" target="_blank">SF</a>
															@endif
															@if($video->download_rc_360p != null || $video->download_rc_360p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_rc_360p)) }}" target="_blank">RC</a>
															@endif
															@if($video->download_kr_360p != null || $video->download_kr_360p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_kr_360p)) }}" target="_blank">KR</a>
															@endif
														@elseif($quality == '480p')
															@if($video->download_gd_480p != null || $video->download_gd_480p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_gd_480p)) }}" target="_blank">GD</a>
															@endif
															@if($video->download_zs_480p != null || $video->download_zs_480p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_zs_480p)) }}" target="_blank">ZS</a>
															@endif
															@if($video->download_sf_480p != null || $video->download_sf_480p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_sf_480p)) }}" target="_blank">SF</a>
															@endif
															@if($video->download_rc_480p != null || $video->download_rc_480p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_rc_480p)) }}" target="_blank">RC</a>
															@endif
															@if($video->download_kr_480p != null || $video->download_kr_480p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_kr_480p)) }}" target="_blank">KR</a>
															@endif
														@elseif($quality == '720p')
															@if($video->download_gd_720p != null || $video->download_gd_720p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_gd_720p)) }}" target="_blank">GD</a>
															@endif
															@if($video->download_zs_720p != null || $video->download_zs_720p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_zs_720p)) }}" target="_blank">ZS</a>
															@endif
															@if($video->download_sf_720p != null || $video->download_sf_720p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_sf_720p)) }}" target="_blank">SF</a>
															@endif
															@if($video->download_rc_720p != null || $video->download_rc_720p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_rc_720p)) }}" target="_blank">RC</a>
															@endif
															@if($video->download_kr_720p != null || $video->download_kr_720p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_kr_720p)) }}" target="_blank">KR</a>
															@endif
														@elseif($quality == '1080p')
															@if($video->download_gd_1080p != null || $video->download_gd_1080p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_gd_1080p)) }}" target="_blank">GD</a>
															@endif
															@if($video->download_zs_1080p != null || $video->download_zs_1080p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_zs_1080p)) }}" target="_blank">ZS</a>
															@endif
															@if($video->download_sf_1080p != null || $video->download_sf_1080p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_sf_1080p)) }}" target="_blank">SF</a>
															@endif
															@if($video->download_rc_1080p != null || $video->download_rc_1080p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_rc_1080p)) }}" target="_blank">RC</a>
															@endif
															@if($video->download_kr_1080p != null || $video->download_kr_1080p != '')
																<a href="{{ route('user.download.encrypt', Crypt::encryptString($video->download_kr_1080p)) }}" target="_blank">KR</a>
															@endif
														@endif
													</div>
													<div class="clear"></div>
												</div>
											</li>
										@endforeach
									</ul>
								@endforeach
							</li>
						</ul>
					@else
						<p><b>Cannot download video before login first...</b></p>
					@endauth
				</div> <!-- .download -->

				<div class="comment">
					<h6>Comment :</h6>
					<div class="single-line"></div>
					@auth
						{{ Form::open(array('route' => ['user.album.comment', $album->slug], 'class' => 'form-control addcomment')) }}
							{{ Form::hidden('album_id', $album->id) }}
							{{ Form::textarea('comment', null, array('class' => 'form-control', 'cols' => '10', 'rows' => '3', 'required' => '', 'placeholder' => 'Enter your comment...')) }}
							{{ Form::submit('Send', array('class' => 'btn btn-primary btn-sm float-sm-right mt-10px')) }}
						{{ Form::close() }}
					@else
						<p><b>You cannot enter your comment before login...</b></p>
					@endauth
					<div class="comment-body">
						@foreach($album->comments as $comment)
							@if($comment->parent_id == 0)
							<table>
								<tbody>
									<tr>
										<td valign="top">
											{{--
											@if($comment->user->image == null)
												<img src="{{ asset('public/image/aa.png') }}" alt="" width="50" height="50">
											@else
												<img src="{{ $comment->user->image }}" alt="" width="50" height="50">
											@endif
											--}}
											<!-- <script src="https://www.avatarapi.com/js.aspx?email=rafliid123@gmail.com&size=50">
												
											</script> -->
											<img src="https://www.gravatar.com/avatar/{{ md5($comment->user->email) }}?s=50" alt="{{ $comment->user->name }}" title="{{ $comment->user->name }}">
										</td>
										<td valign="top" class="rep">
											<b>{{ $comment->user->name }}</b> <small>{{ date('D, j F Y', strtotime($comment->created_at)) }}</small>
											<p>{{ $comment->comment }}</p>
											<button class="btn btn-primary btn-sm reply">Reply</button>
											<div class="form-reply">
												@auth
													{{ Form::open(array('route' => ['user.album.comment', $album->slug], 'class' => 'form-control comment')) }}
														{{ Form::hidden('album_id', $album->id) }}
														{{ Form::hidden('parent_id', $comment->id) }}
														{{ Form::textarea('comment', null, array('class' => 'form-control', 'cols' => '10', 'rows' => '3', 'required' => '', 'placeholder' => 'Enter your comment...')) }}
														{{ Form::submit('Send', array('class' => 'btn btn-primary btn-sm float-sm-right mt-10px')) }}
													{{ Form::close() }}
												@else
													<p><b>You cannot enter your comment before login...</b></p>
												@endauth
											</div>
											@if($comment->replies)
												@include('partials.comment', ['comments' => $comment->replies])
											@endif
										</td>
									</tr>
								</tbody>
							</table>
							@endif
						@endforeach
					</div>
				</div> <!-- .comment -->
			</div> <!-- .box-content -->
		</div>
		<div class="col-md-4">
			<div class="sidebar">
				@include('partials.sidebar')
			</div>
		</div>
	</div>
@endsection

@section('bottomscript')
	<script type="text/javascript">
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
		const player = new Plyr('#player');
	</script>
@endsection