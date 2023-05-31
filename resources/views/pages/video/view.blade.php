@extends('main')

@section('title', '{{ $video->name }}')

@section('stylesheets')
	{{ Html::style('public/css/pages/video/view.css') }}
@endsection

@section('content')
@endsection

@section('content-container')
	<div class="row">
		<div class="col-md-8">
			<div class="box-content">
				<div class="video">
					<video controls playsinline id="player">
						@if($video->video_240p != 'nothing')
							<source src="{{ $video->video_240p }}" type="video/mp4" size="240">
						@elseif($video->url_240p != 'nothing')
							<source src="{{ $video->url_240p }}" type="video/mp4" size="240">
						@endif
						@if($video->video_360p != 'nothing')
							<source src="{{ $video->video_360p }}" type="video/mp4" size="360">
						@elseif($video->url_360p != 'nothing')
							<source src="{{ $video->url_360p }}" type="video/mp4" size="360">
						@endif
						@if($video->video_480p != 'nothing')
							<source src="{{ $video->video_480p }}" type="video/mp4" size="480">
						@elseif($video->url_480p != 'nothing')
							<source src="{{ $video->url_480p }}" type="video/mp4" size="480">
						@endif
						@if($video->video_720p != 'nothing')
							<source src="{{ $video->video_720p }}" type="video/mp4" size="720">
						@elseif($video->url_720p != 'nothing')
							<source src="{{ $video->url_720p }}" type="video/mp4" size="720">
						@endif
						@if($video->video_1080p != 'nothing')
							<source src="{{ $video->video_1080p }}" type="video/mp4" size="1080">
						@elseif($video->url_1080p != 'nothing')
							<source src="{{ $video->url_1080p }}" type="video/mp4" size="1080">
						@endif
					</video>
				</div> <!-- .video -->

				<div class="video-info">
					<div class="row">
						<div class="col-md-10">
							<p>{{ $video->watch_count }}x ditonton</p>
						</div>
						<div class="col-md-1">
							<span class="fa fa-thumbs-up"></span> {{ $video->like }}
						</div>
						<div class="col-md-1">
							<span class="fa fa-thumbs-down"></span> {{ $video->dislike }}
						</div>
					</div>
				</div> <!-- .video-info -->

				<div class="episode">
					<select name="episodes" id="" class="form-control" onchange="location = this.value;">
						@foreach($album->videos as $listvideo)
							@if($listvideo->id == $video->id)
								<option value="{{ route('user.video.show', $listvideo->slug) }}" selected>{{ $listvideo->name }}</option>
							@else
								<option value="{{ route('user.video.show', $listvideo->slug) }}">{{ $listvideo->name }}</option>
							@endif
						@endforeach
					</select>
				</div> <!-- .episode -->

				<div class="sinopsis">
					<h6>Sinopsis :</h6>
					<div class="single-line"></div>
					<p>{{ $album->sinopsis }}</p>
				</div> <!-- .sinopsis -->
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
		const player = new Plyr('#player');
		player.on('ended', function() {
			$.ajax({
				url: "{{ route('user.video.watched') }}",
				method: 'POST',
				data: {
					'id': "{{ $video->id }}"
				},
				success: function(data) {
					alert('Video has ended');
				}
			});
		});
	</script>
@endsection