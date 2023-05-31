<div class="accordion" id="genres-name">
	@foreach($genres as $genre)
		@if(strtoupper(substr($genre->name, 0, 1)) == $abjad)
			@if($loop->first)
				<div class="card">
					<div class="card-header" id="heading{{ $genre->id }}">
						<h5 class="mb-0">
							<a class="" data-toggle="collapse" href="#collapse{{ $genre->id }}" role="button" aria-expanded="true" aria-controls="collapse{{ $genre->id }}">
								<span class="fa fa-minus"></span> {{ $genre->name }}
							</a>
						</h5>
					</div>

					<div id="collapse{{ $genre->id }}" class="collapse show" aria-labelledby="heading{{ $genre->id }}" data-parent="#genres-name">
						<div class="card-body">
							
						</div>
					</div>
				</div>
			@else
				<div class="card">
					<div class="card-header" id="heading{{ $genre->id }}">
						<h5 class="mb-0">
							<a class="" data-toggle="collapse" href="#collapse{{ $genre->id }}" role="button" aria-expanded="false" aria-controls="collapse{{ $genre->id }}">
								<span class="fa fa-plus"></span> {{ $genre->name }}
							</a>
						</h5>
					</div>

					<div id="collapse{{ $genre->id }}" class="collapse" aria-labelledby="heading{{ $genre->id }}" data-parent="#genres-name">
						<div class="card-body">
							
						</div>
					</div>
				</div>
			@endif
		@endif
	@endforeach
</div> <!-- .accordion -->