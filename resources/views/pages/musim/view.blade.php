@extends('main')

@section('title', '{{ $musim->name }}')

@section('stylesheets')
	{{ Html::style('public/css/pages/musims.css') }}
@endsection

@section('content')
@endsection

@section('content-container')
	<div class="row">
		<div class="col-md-8">
			<div class="box-content">
				<div class="musims-content">
					<div class="semi">
						<h1 class="title">{{ $musim->name }} Archive <span class="fa fa-rss"></span></h1>
						<div class="line">
							<div class="single-line"></div>
						</div>
						@foreach($albums as $album)
							<article class="post">
								<div class="row">
									<div class="col-md-4">
										<div class="thumbnail">
											<a href="{{ route('user.album.show', $album->slug) }}">
												<img src="{{ $album->image_banner }}" width="245" height="156">
											</a>
										</div> <!-- .thumbnail -->						
									</div> <!-- .col-md-4 -->
									<div class="col-md-8">
										<b><a href="{{ route('user.album.show', $album->slug) }}">{{ substr(strip_tags($album->name), 0, 55) }}{{ strlen(strip_tags($album->name)) > 55 ? "..." : "" }}</a></b>
										<br>
										<div class="vertical-line">
											<div class="info">
												<li>
													<b>
														<span class="fa fa-clock"></span> Date :
													</b>{{ date('D, j F Y - H:i:s T', strtotime($album->created_at)) }}
												</li>
												<li>
													<b>
														<span class="fa fa-comments"></span> Comment :
													</b> 6
												</li>
												<li class="category">
													<b>
														<span class="fa fa-tags"></span> Category :
													</b>
													@foreach($album->genres as $genre)
														@if($loop->last)
															<a href="{{ route('user.genre.show', $genre->slug) }}">{{ $genre->name }}</a>
														@else
															<a href="{{ route('user.genre.show', $genre->slug) }}">{{ $genre->name }}</a><span> , </span>
														@endif
													@endforeach
												</li>
												<li class="series">
													<b>
														<span class="fa fa-th-list"></span> Series :
													</b>
													<a href="{{ route('user.album.show', $album->slug) }}">{{ $album->name }}</a>
												</li>
												<li>
													<span class="complete-info">
														<span class="fa fa-box-open"></span> {{ $album->status->name }}
													</span>
												</li>
											</div> <!-- .info -->						
										</div> <!-- .vertical-line -->
									</div>
								</div>
								<div class="line-break"></div>
							</article>
						@endforeach
					</div> <!-- .semi -->
					<div class="text-center">
						{{ $albums->links() }}
					</div>
				</div> <!-- .all-complete -->
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
	<!-- <script type="text/javascript">
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
		}
		const player = new Plyr('#player');
	</script> -->
@endsection