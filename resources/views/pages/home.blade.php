@extends('main')

@section('title', 'Home')

@section('stylesheets')
@endsection

@section('content')
	@include('partials.support.modal.warning')
@endsection

@section('content-container')
	<div class="box-content">
		<div class="latest-update-ongoing">
			<div class="semi">
				<div class="heading">
					<div class="content">
						<h4 class="anime-last">Latest Update Anime</h4>
						<span>On-Going</span>
						<a href="https://nimegami.com/tag/on-going/" target="_blank">View More</a>
					</div>
				</div> <!-- .heading -->

				<div class="wrapper">
					<div class="owl-carousel owl-theme">
						@foreach($ongoings as $ongoing)
							<div class="item">
								<a href="{{ route('user.album.show', $ongoing->slug) }}">
									<div class="img-box">
										<img src="{{ $ongoing->image_banner }}" alt="" width="400" height="218">
									</div>
									<div class="content">
										<h2>{{ $ongoing->name }}</h2>
									</div>
								</a>
							</div>
						@endforeach
					</div>
				</div> <!-- .wrapper -->
			</div> <!-- .semi -->
		</div> <!-- .latest-update-ongoing -->

		<div class="latest-update-complete">
			<div class="semi">
				<div class="heading">
					<div class="content">
						<h4 class="anime-last">Latest Update Complete</h4>
						<span>Complete</span>
						<a href="https://nimegami.com/tag/on-going/" target="_blank">View More</a>
					</div>
				</div> <!-- .heading -->

				<div class="wrapper">
					<div class="owl-carousel owl-theme">
						@foreach($completes as $complete)
							<div class="item">
								<a href="{{ route('user.album.show', $complete->slug) }}">
									<div class="img-box">
										<img src="{{ $complete->image_banner }}" alt="" width="400" height="218">
									</div>
									<div class="content">
										<h2>{{ $complete->name }}</h2>
									</div>
								</a>
							</div>
						@endforeach
					</div>
				</div> <!-- .wrapper -->
			</div> <!-- .semi -->
		</div> <!-- .latest-update-complete -->

		<div class="middle-content">
			<div class="row">
				<div class="col-md-8">
					<div class="all-completes">
						<div class="semi">
							<h1 class="title">Kuremi - All Updates <span class="fa fa-rss"></span></h1>
							<div class="line">
								<div class="single-line"></div>
							</div>
							@foreach($videos as $video)
								@if($video->album->status->id == 1)
									<article class="post">
										<div class="row">
											<div class="col-md-4">
												<div class="thumbnail">
													<a href="{{ route('user.video.show', $video->slug) }}">
														<img src="{{ $video->album->image_banner }}" width="245" height="156">
													</a>
												</div> <!-- .thumbnail -->						
											</div> <!-- .col-md-4 -->
											<div class="col-md-8">
												<b><a href="{{ route('user.video.show', $video->slug) }}">{{ substr(strip_tags($video->name), 0, 55) }}{{ strlen(strip_tags($video->name)) > 55 ? "..." : "" }}</a></b>
												<br>
												<div class="vertical-line">
													<div class="info">
														<li>
															<b>
																<span class="fa fa-clock"></span> Date :
															</b>{{ date('D, j F Y - H:i:s T', strtotime($video->created_at)) }}
														</li>
														<li>
															<b>
																<span class="fa fa-comments"></span> Comment :
															</b> {{ Helper::comments($video->album->id)->count() }}
														</li>
														<li class="category">
															<b>
																<span class="fa fa-tags"></span> Category :
															</b>
															@foreach($video->album->genres as $genre)
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
															<a href="{{ route('user.album.show', $video->album->slug) }}">{{ $video->album->name }}</a>
														</li>
														<li>
															<span class="complete-info">
																<span class="fa fa-box-open"></span> {{ $video->album->status->name }}
															</span>
														</li>
													</div> <!-- .info -->						
												</div> <!-- .vertical-line -->
											</div>
										</div>
										<div class="line-break"></div>
									</article>
								@endif
							@endforeach
						</div> <!-- .semi -->
						<div class="text-center">
							{{ $videos->links() }}
						</div>
					</div> <!-- .all-complete -->
				</div>
				<div class="col-md-4">
					@include('partials.sidebar')
				</div>
			</div>
		</div> <!-- .middle-content -->
	</div> <!-- .box-content -->
@endsection

@section('bottomscript')
	<script type="text/javascript">
		// $('#modal-warning').modal('show');
		
		$('.owl-carousel').owlCarousel({
		    loop: true,
		    margin: 10,
		    nav: true,
		    autoplay: true,
		    autoplayTimeout: 1500,
		    autoplayHoverPause: true,
		    center: true,
		    dots: false,
		    responsive: {
		        0: {
		            items: 1
		        },
		        600: {
		            items: 2
		        },
		        1000: {
		            items: 3
		        }
		    }
		});
	</script>
@endsection