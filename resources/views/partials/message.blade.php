@if(session('success'))
<div class="container">
	<div class="row">
		<div class="col-xs-10">
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Success :</strong> {{ session('success') }}
			</div>
		</div>
	</div>
</div>
@endif

@if(session('errors'))
<div class="container">
	<div class="row">
		<div class="col-xs-10">
			<div class="alert alert-warning alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>Success :</strong> {{ session('errors') }}
			</div>
		</div>
	</div>
</div>
@endif