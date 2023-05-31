@extends('main')

@section('title', 'Jadwal')

@section('stylesheets')
	{{ Html::style('public/css/pages/jadwal.css') }}
	<style type="text/css">
		body .box-content .jadwal {
			background-image: url("{{ asset('public/image/paper-background-vector-set.png') }}");
			background-size: cover;
		}
	</style>
@endsection

@section('content')
@endsection

@section('content-container')
	<div class="row">
		<div class="col-md-10">
			<div class="box-content">
				@foreach($days as $day)
					<div class="jadwal">
						<h5>{{ $day->name }}</h5>
						<ul>
							@foreach($albums as $album)
								@if($day->id == $album->day_id)
									<li>
										<a href="{{ route('user.album.show', $album->slug) }}">{{ $album->name }}</a>
									</li>
								@endif
							@endforeach
						</ul>
					</div>
				@endforeach
				<div class="clear"></div>
			</div>
		</div>
		<div class="col-md-2">
			<div class="sidebar">
				@include('partials.sidebar')
			</div>
		</div>
	</div>
@endsection