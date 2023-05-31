@extends('admin.dashboard')

@section('title', 'View Albums')

@section('content-header', 'Album')
@section('sub-content-header', 'View All Albums')

@section('breadcrumb')
	<li>
		<a href="{{ route('admin.home') }}">
			<i class="fa fa-dashboard"></i> Home
		</a>
	</li>
	<li>
		<a href="{{ route('album.index') }}">
			<i class="fa fa-suitcase"></i> Album
		</a>
	</li>
	<li class="active">View Albums</li>
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
						@if(count($albums) > 0)
							<table class="table table-bordered table-striped" id="table-type1">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>Picture</th>
										<th>Durasi</th>
										<th>Release</th>
										<th>Produser</th>
										<th>Rating</th>
										<th>Status</th>
										<th>Musim</th>
										<th>Approved</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($albums as $album)
										<tr>
											<td>{{ $album->id }}</td>
											<td>{{ substr(strip_tags($album->name), 0, 40) }}{{ strlen(strip_tags($album->name)) > 40 ? "..." : "" }}</td>
											<td>
												<img src="{{ $album->image_default }}" alt="" style="height: 30px;">
											</td>
											<td>{{ $album->durasi }}</td>
											<td>{{ date('D, j F Y', strtotime($album->release)) }}</td>	
											<td>{{ $album->produser }}</td>
											<td>{{ $album->rating }}</td>
											<td>
												@if($album->status_id == null)
													Unstatused
												@else
													{{ $album->status->name }}
												@endif
											</td>
											<td>
												@if($album->musim_id == null)
													Unknown
												@else
													{{ $album->musim->name }}
												@endif
											</td>
											<td>
												@if($album->is_approved)
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
															<a href="{{ route('album.edit', $album->id) }}">Edit</a>
														</li>
														<li>
															{{ Form::open(['route' => ['album.destroy', $album->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure?");']) }}
																{{ Form::submit('Delete', ['class' => 'delete-button-item']) }}
															{{ Form::close() }}
														</li>
														<li class="divider"></li>
														@if($album->is_approved)
															<li>
																<a href="{{ route('album.approve', array('id' => $album->id, 'approve_status' => 0, 'message' => 'decline')) }}">Decline</a>
															</li>
														@else
															<li>
																<a href="{{ route('album.approve', array('id' => $album->id, 'approve_status' => 1, 'message' => 'approve')) }}">Approve</a>
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