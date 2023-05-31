@extends('admin.dashboard')

@section('title', 'View Insights')

@section('content-header', 'Insight')
@section('sub-content-header', 'View All Insights')

@section('breadcrumb')
	<li>
		<a href="{{ route('admin.home') }}">
			<i class="fa fa-dashboard"></i> Home
		</a>
	</li>
	<li>
		<a href="{{ route('insight.index') }}">
			<i class="fa fa-suitcase"></i> Insight
		</a>
	</li>
	<li class="active">View Insights</li>
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
						@if(count($insights) > 0)
							<table class="table table-bordered table-striped" id="table-type1">
								<thead>
									<tr>
										<th>Id</th>
										<th>Album Name</th>
										<th>Slug</th>
										<th>Name Character</th>
										<th>Image Character</th>
										<th>Peran Character</th>
										<th>Name Pemeran</th>
										<th>Image Pemeran</th>
										<th>Negara</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($insights as $insight)
										<tr>
											<td>{{ $insight->id }}</td>
											<td>{{ substr(strip_tags($insight->album->name), 0, 20) }}{{ strlen(strip_tags($insight->album->name)) > 20 ? "..." : "" }}</td>
											<td>
												<a href="{{ route('user.album.show', $insight->album->slug) }}" target="_blank">
													{{ substr(strip_tags($insight->album->slug), 0, 20) }}{{ strlen(strip_tags($insight->album->slug)) > 20 ? "..." : "" }}
												</a>
											</td>
											<td>{{ $insight->name_anime_character }}</td>
											<td>
												<img src="{{ $insight->image_anime_character }}" alt="" style="height: 30px;">
											</td>
											<td>{{ $insight->peran->name }}</td>
											<td>{{ $insight->name_orang }}</td>
											<td>
												<img src="{{ $insight->image_orang }}" alt="" style="height: 30px;">
											</td>
											<td>{{ $insight->negara->name }}</td>
											<td>
												<div class="dropdown btn btn-default">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														Action
														<span class="caret"></span>
													</a>
													<ul class="dropdown-menu">
														<li>
															<a href="{{ route('insight.edit', $insight->id) }}">Edit</a>
														</li>
														<li>
															{{ Form::open(['route' => ['insight.destroy', $insight->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure?");']) }}
																{{ Form::submit('Delete', ['class' => 'delete-button-item']) }}
															{{ Form::close() }}
														</li>
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