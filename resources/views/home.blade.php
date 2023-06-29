@extends('layouts.base')

@section('main')
	@foreach ($comics as $comic)
		<h3>Artists:</h3>
		<ul>
			@foreach (unserialize($comic->artists) as $artist)
				<li>{{ $artist }}</li>
			@endforeach
		</ul>

		<h3>Writers:</h3>
		<ul>
			@foreach (unserialize($comic->writers) as $writer)
				<li>{{ $writer }}</li>
			@endforeach
		</ul>
	@endforeach

	<h1 class="main-title">DC COMICS</h1>
	<div class="container">
		<h1>Comic List</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Description</th>
					<th>Thumb</th>
					<th>Price</th>
					<th>Series</th>
					<th>Sale Date</th>
					<th>Type</th>
					<th>Artists</th>
					<th>Writers</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($comics as $comic)
					<tr>
						<td>{{ $comic->id }}</td>
						<td>{{ $comic->title }}</td>
						<td>{{ $comic->description }}</td>
						<td><img src="{{ $comic->thumb }}" alt="Comic Thumbnail"></td>
						<td>{{ $comic->price }}</td>
						<td>{{ $comic->series }}</td>
						<td>{{ $comic->sale_date }}</td>
						<td>{{ $comic->type }}</td>
						<td>
							@if ($comic->artists && is_string($comic->artists))
								@foreach (unserialize($comic->artists) as $artist)
									{{ $artist }}<br>
								@endforeach
							@endif
						</td>
						<td>
							@if ($comic->writers && is_string($comic->writers))
								@foreach (unserialize($comic->writers) as $writer)
									{{ $writer }}<br>
								@endforeach
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
