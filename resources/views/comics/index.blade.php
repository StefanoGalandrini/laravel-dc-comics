@extends('layouts.base')

@section('main')
	<h1 class="main-title">DC COMICS</h1>

	{{-- Messaggio di cancellazione e bottone di ripristino --}}
	@if (session('delete_success'))
		@php $comic = session('delete_success') @endphp
		<div class="alert alert-danger">
			Il fumetto "{{ $comic->title }}" è stato eliminato
			<form action="{{ route('comics.restore', ['comic' => $comic]) }}" method="post">
				@csrf
				<button class="btn btn-danger">Ripristina</button>
			</form>
		</div>
	@endif

	@if (session('restore_success'))
		@php $comic = session('restore_success') @endphp
		<div class="alert alert-success">
			Il fumetto "{{ $comic->title }}" è stato ripristinato
		</div>
	@endif

	<div class="general-buttons">
		<a class="btn btn-primary action-button" href="{{ route('home') }}">Home</a>
		<a class="btn btn-warning action-button" href="{{ route('comics.create') }}">Create</a>
		<a class="btn btn-danger action-button" href="{{ route('comics.trashed') }}">Trashcan</a>
	</div>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th class="title">Title</th>
				<th class="description">Description</th>
				<th>Thumb</th>
				<th class="info">Info</th>
				<th>Artists</th>
				<th>Writers</th>
				<th class="buttons">ACTIONS</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($comics as $comic)
				<tr>
					<td>{{ $comic->id }}</td>
					<td class="comic-title">{{ $comic->title }}</td>
					<td><span class="comic-description">{{ $comic->description }}</span></td>
					<td><img class="comic-thumb" src="{{ $comic->thumb }}" alt="Comic Thumbnail"></td>
					<td>
						<table class="comic-info">
							<tr>
								<td class="comic-rows"><span class="comic-label">Price: </span>{{ $comic->price }}</td>
							</tr>
							<tr>
								<td class="comic-rows"><span class="comic-label">Series: </span>{{ $comic->series }}</td>
							</tr>
							<tr>
								<td class="comic-rows"><span class="comic-label">Sale Date: </span>{{ $comic->sale_date }}</td>
							</tr>
							<tr>
								<td class="comic-rows"><span class="comic-label">Type: </span>{{ $comic->type }}</td>
							</tr>
						</table>
					</td>


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
						<a class="btn btn-success action-button" href="{{ route('comics.show', ['comic' => $comic->id]) }}">Show</a>
						<a class="btn btn-danger action-button" href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Edit</a>

					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $comics->links() }}
@endsection
