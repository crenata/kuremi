@extends('main')

@section('title', 'Ongoing List')

@section('stylesheets')
	{{ Html::style('public/css/pages/ongoings.css') }}
@endsection

@section('content')
@endsection

@section('content-container')
	<div class="row">
		<div class="col-md-8">
			<div class="box-content">
				<div class="all-ongoings">
					<div class="semi">
						<h1 class="title">Kuremi - All Ongoing Updates <span class="fa fa-rss"></span></h1>
						<div class="line">
							<div class="single-line"></div>
						</div>
						@foreach($ongoings as $ongoing)
							<article class="post">
								<div class="row">
									<div class="col-md-4">
										<div class="thumbnail">
											<a href="{{ route('user.album.show', $ongoing->slug) }}">
												<img src="{{ $ongoing->image_banner }}" width="245" height="156">
											</a>
										</div> <!-- .thumbnail -->						
									</div> <!-- .col-md-4 -->
									<div class="col-md-8">
										<b><a href="{{ route('user.album.show', $ongoing->slug) }}">{{ substr(strip_tags($ongoing->name), 0, 55) }}{{ strlen(strip_tags($ongoing->name)) > 55 ? "..." : "" }}</a></b>
										<br>
										<div class="vertical-line">
											<div class="info">
												<li>
													<b>
														<span class="fa fa-clock"></span> Date :
													</b>{{ date('D, j F Y - H:i:s T', strtotime($ongoing->created_at)) }}
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
													@foreach($ongoing->genres as $genre)
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
													<a href="{{ route('user.album.show', $ongoing->slug) }}">{{ $ongoing->name }}</a>
												</li>
												<li>
													<span class="complete-info">
														<span class="fa fa-box-open"></span> {{ $ongoing->status->name }}
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
						{{ $ongoings->links() }}
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