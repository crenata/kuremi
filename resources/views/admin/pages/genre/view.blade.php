@extends('admin.dashboard')

@section('title', 'View Genres')

@section('content-header', 'Genre')
@section('sub-content-header', 'View All Genres')

@section('breadcrumb')
	<li>
		<a href="{{ route('admin.home') }}">
			<i class="fa fa-dashboard"></i> Home
		</a>
	</li>
	<li>
		<a href="{{ route('genre.index') }}">
			<i class="fa fa-align-center"></i> Genre
		</a>
	</li>
	<li class="active">View Genres</li>
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
			<div class="col-xs-6">
				<div class="box">
					<div class="box-body">
						@if(count($genres) > 0)
							<table class="table table-bordered table-striped" id="table-type1">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>Slug</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($genres as $genre)
										<tr>
											<td>{{ $genre->id }}</td>
											<td>{{ substr(strip_tags($genre->name), 0, 20) }}{{ strlen(strip_tags($genre->name)) > 20 ? "..." : "" }}</td>
											<td>{{ substr(strip_tags($genre->slug), 0, 20) }}{{ strlen(strip_tags($genre->slug)) > 20 ? "..." : "" }}</td>
											<td>
												<div class="dropdown btn btn-default">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														Action
														<span class="caret"></span>
													</a>
													<ul class="dropdown-menu">
														<li>
															<a href="{{ route('genre.edit', $genre->id) }}">Edit</a>
														</li>
														<li>
															{{ Form::open(['route' => ['genre.destroy', $genre->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Are you sure?");']) }}
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