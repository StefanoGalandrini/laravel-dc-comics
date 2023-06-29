@extends('layouts.base')

@section('main')
	<h1 class="main-title">DC COMICS</h1>
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
				<th>ACTIONS</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($comics as $comic)
				<tr>
					<td>{{ $comic->id }}</td>
					<td>{{ $comic->title }}</td>
					<td>{{ $comic->description }}</td>
					<td><img class="comic-thumb" src="{{ $comic->thumb }}" alt="Comic Thumbnail"></td>
					<td>{{ $comic->price }}</td>
					<td>{{ $comic->series }}</td>
					<td>{{ $comic->sale_date }}</td>
					<td>{{ $comic->type }}</td>
					<td>
						<ul>
							@foreach ($comic->artists as $artist)
								<li>
									{{ $loop->last ? $artist : $artist . ', ' }}
								</li>
							@endforeach
						</ul>
					</td>
					<td>
						<ul>
							@foreach ($comic->writers as $writer)
								<li>
									{{ $loop->last ? $writer : $writer . ', ' }}
								</li>
							@endforeach
						</ul>
					</td>
					<td class="actions">
						<a class="btn btn-primary" href="{{ route('home') }}">View</a>
						<a class="btn btn-success" href="{{ route('comics.show', ['comic' => $comic->id]) }}">Show</a>
						<a class="btn btn-warning" href="{{ route('comics.create') }}">Create</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
