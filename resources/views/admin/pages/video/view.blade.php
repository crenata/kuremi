@extends('admin.dashboard')

@section('title', 'View Videos')

@section('content-header', 'Video')
@section('sub-content-header', 'View All Videos')

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
	<li class="active">View Videos</li>
@endsection

@section('stylesheets')
	<style type="text/css">
		.delete-button-item {
			font-family: inherit;
			font-size: inherit;
			box-sizing: none;
			background-color: transparent;
			width: 100%;
			text-align: left;
			border: none;
			opacity: 0.8;
			outline: none;
			background: none;
			cursor: pointer;
			padding: 2px 0 2px 20px;
		}
		.delete-button-item:hover {
			/*background-color: #E1E3E9;*/
			background-color: red;
			color: black;
			opacity: 0.9;
		}
	</style>
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-11">
				<div class="box">
					<div class="box-body">
						@if(count($videos) > 0)
							<table class="table table-bordered table-striped" id="table-type1">
								<thead>
									<tr>
										<th>Id</th>
										<!-- <th>Album Id</th> -->
										<th>Name</th>
										<th>Slug</th>
										<th>240p</th>
										<th>360p</th>
										<th>480p</th>
										<th>720p</th>
										<th>1080p</th>
										<th>Like</th>
										<th>Dislike</th>
										<th>Watch Count</th>
										<th>Approved</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($videos as $video)
										<tr>
											<td>{{ $video->id }}</td>
											<!-- <td>{{ $video->album->id }}</td> -->
											<td>{{ substr(strip_tags($video->name), 0, 20) }}{{ strlen(strip_tags($video->name)) > 20 ? "..." : "" }}</td>
											<td>
												<a href="{{ route('user.video.show', $video->slug) }}" target="_blank">
													{{ substr(strip_tags($video->slug), 0, 20) }}{{ strlen(strip_tags($video->slug)) > 20 ? "..." : "" }}
												</a>
											</td>
											<td>
												@if($video->video_240p != null && $video->url_240p != null)
													<span class="fa fa-check">Video</span>
													<span class="fa fa-check">Url</span>
												@elseif($video->video_240p != null)
													<span class="fa fa-check">Video</span>
													<span class="fa fa-window-close">Url</span>
												@elseif($video->url_240p != null)
													<span class="fa fa-window-close">Video</span>
													<span class="fa fa-check">Url</span>
												@else
													<span class="fa fa-window-close">Video</span>
													<span class="fa fa-window-close">Url</span>
												@endif
											</td>
											<td>
												@if($video->video_360p != null && $video->url_360p != null)
													<span class="fa fa-check">Video</span>
													<span class="fa fa-check">Url</span>
												@elseif($video->video_360p != null)
													<span class="fa fa-check">Video</span>
													<span class="fa fa-window-close">Url</span>
												@elseif($video->url_360p != null)
													<span class="fa fa-window-close">Video</span>
													<span class="fa fa-check">Url</span>
												@else
													<span class="fa fa-window-close">Video</span>
													<span class="fa fa-window-close">Url</span>
												@endif
											</td>
											<td>
												@if($video->video_480p != null && $video->url_480p != null)
													<span class="fa fa-check">Video</span>
													<span class="fa fa-check">Url</span>
												@elseif($video->video_480p != null)
													<span class="fa fa-check">Video</span>
													<span class="fa fa-window-close">Url</span>
												@elseif($video->url_480p != null)
													<span class="fa fa-window-close">Video</span>
													<span class="fa fa-check">Url</span>
												@else
													<span class="fa fa-window-close">Video</span>
													<span class="fa fa-window-close">Url</span>
												@endif
											</td>
											<td>
												@if($video->video_720p != null && $video->url_720p != null)
													<span class="fa fa-check">Video</span>
													<span class="fa fa-check">Url</span>
												@elseif($video->video_720p != null)
													<span class="fa fa-check">Video</span>
													<span class="fa fa-window-close">Url</span>
												@elseif($video->url_720p != null)
													<span class="fa fa-window-close">Video</span>
													<span class="fa fa-check">Url</span>
												@else
													<span class="fa fa-window-close">Video</span>
													<span class="fa fa-window-close">Url</span>
												@endif
											</td>
											<td>
												@if($video->video_1080p != null && $video->url_1080p != null)
													<span class="fa fa-check">Video</span>
													<span class="fa fa-check">Url</span>
												@elseif($video->video_1080p != null)
													<span class="fa fa-check">Video</span>
													<span class="fa fa-window-close">Url</span>
												@elseif($video->url_1080p != null)
													<span class="fa fa-window-close">Video</span>
													<span class="fa fa-check">Url</span>
												@else
													<span class="fa fa-window-close">Video</span>
													<span class="fa fa-window-close">Url</span>
												@endif
											</td>
											<td>{{ $video->like }}</td>
											<td>{{ $video->dislike }}</td>
											<td>{{ $video->watch_count }}</td>
											<td>
												@if($video->is_approved)
													<span class="label label-success">Approved</span>
												@else
													<span class="label label-warning">Pending</span>
												@endif
											</td>
											<td>
												<div class="dropdown btn btn-default">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														Action
														<span class="caret"></span>
													</a>
													<ul class="dropdown-menu">
														<li>
															<a href="{{ route('video.edit', $video->id) }}">Edit</a>
														</li>
														<li>
															{{ Form::open(['route' => ['video.destroy', $video->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure?");']) }}
																{{ Form::submit('Delete', ['class' => 'delete-button-item']) }}
															{{ Form::close() }}
														</li>
														<li class="divider"></li>
														@if($video->is_approved)
															<li>
																<a href="{{ route('video.approve', array('id' => $video->id, 'approve_status' => 0, 'message' => 'decline')) }}">Decline</a>
															</li>
														@else
															<li>
																<a href="{{ route('video.approve', array('id' => $video->id, 'approve_status' => 1, 'message' => 'approve')) }}">Approve</a>
															</li>
														@endif
													</ul>
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							<h3 class="no-result">No results found</h3>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection