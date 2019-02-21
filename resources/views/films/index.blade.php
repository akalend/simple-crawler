
	@if (count($films) > 0)
		<ul class="list-group">
		@foreach ($films as $film)
			<li class="list-group-item">{{ $film->title }} {{ $film->date_show }}</li>
			сезон эпизод
			<li class="list-group-item">{{ $film->title }} {{ $film->date_show }}</li>
		@endforeach
		</ul>
	@endif
