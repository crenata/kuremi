@extends('main')

@section('title', 'Genres')

@section('stylesheets')
	{{ Html::style('public/css/pages/genres.css') }}
@endsection

@section('content')
@endsection

@section('content-container')
	<div class="box-content">
		<h4>Genre List</h4>
		{{--<!-- <div class="genres-accordion">
			<div class="accordion" id="genres-abjad">
				@foreach(array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z') as $abjad)
					@if($loop->first)
						<div class="card">
							<div class="card-header" id="heading{{ $abjad }}">
								<h5 class="mb-0">
									<a class="" data-toggle="collapse" href="#collapse{{ $abjad }}" role="button" aria-expanded="true" aria-controls="collapse{{ $abjad }}">
										<span class="fa fa-minus"></span> {{ $abjad }}
									</a>
								</h5>
							</div>
		
							<div id="collapse{{ $abjad }}" class="collapse show" aria-labelledby="heading{{ $abjad }}" data-parent="#genres-abjad">
								<div class="card-body">
									@include('partials.genre')
								</div>
							</div>
						</div>
					@else
						<div class="card mt-10px">
							<div class="card-header" id="heading{{ $abjad }}">
								<h5 class="mb-0">
									<a class="" data-toggle="collapse" href="#collapse{{ $abjad }}" role="button" aria-expanded="false" aria-controls="collapse{{ $abjad }}">
										<span class="fa fa-plus"></span> {{ $abjad }}
									</a>
								</h5>
							</div>
							<div id="collapse{{ $abjad }}" class="collapse" aria-labelledby="heading{{ $abjad }}" data-parent="#genres-abjad">
								<div class="card-body">
									@include('partials.genre')
								</div>
							</div>
						</div>
					@endif
				@endforeach
			</div> .accordion
		</div> -->--}}
		<div class="row">
			<div class="col-md-8">
				<ul>
					@foreach($genres as $genre)
						<li>
							<a href="{{ route('user.genre.show', $genre->slug) }}">{{ $genre->name }}</a>
						</li>
					@endforeach
				</ul>
				<div class="clear"></div>
			</div>
			<div class="col-md-4">
				
			</div>
		</div>
	</div> <!-- .box-content -->
@endsection

@section('bottomscript')
	{{ Html::script('public/js/pages/genres.js') }}
	<!-- <script type="text/javascript">
		$('.collapse').on('shown.bs.collapse', function() {
			$(this).parent().find('.fa-plus').addClass('fa-minus').removeClass('fa-plus');
		}).on('hidden.bs.collapse', function() {
			$(this).parent().find('.fa-minus').addClass('fa-plus').removeClass('fa-minus');
		});
	</script> -->
@endsection