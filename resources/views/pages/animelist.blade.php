@extends('main')

@section('title', 'Anime List')

@section('stylesheets')
	{{ Html::style('public/css/pages/animelist.css') }}
@endsection

@section('content')
@endsection

@section('content-container')
	<div class="row">
		<div class="col-md-8">
			<div class="box-content">
				<h4>Anime List</h4>
				<div class="alphabet">
					<ul>
						@foreach(array('#', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z') as $abjad)
							<li>
								<a href="#{{ $abjad }}">{{ $abjad }}</a>
							</li>
						@endforeach
					</ul>
				</div>

				<div class="clear"></div>

				<div class="anime-list">
					@foreach(array('#', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z') as $abjad)
						<h6 id="{{ $abjad }}">{{ $abjad }}</h6>
						<div class="single-line"></div>
						<div class="clear"></div>
						<ul>
							@foreach($albums as $album)
								@if(strtoupper(substr($album->name, 0, 1)) == $abjad)
									<li>
										<a href="{{ route('user.album.show', $album->slug) }}">{{ $album->name }}</a>
									</li>
								@endif						
							@endforeach
						</ul>
						<div class="clear"></div>
					@endforeach
				</div> <!-- .anime-list -->
			</div> <!-- .box-content -->
		</div>
		<div class="col-md-4">
			<div class="sidebar">
				@include('partials.sidebar')
			</div>
		</div>
	</div>
@endsection