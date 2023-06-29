@extends('layouts.base')

@section('main')
	<h1 class="main-title">DC COMICS</h1>
	<div class="container">
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
							@foreach ($comic->artists as $artist)
								{{ $loop->last ? $artist : $artist . ', ' }}
							@endforeach
						</td>
						<td>
							@foreach ($comic->writers as $writer)
								{{ $loop->last ? $writer : $writer . ', ' }}
							@endforeach
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
