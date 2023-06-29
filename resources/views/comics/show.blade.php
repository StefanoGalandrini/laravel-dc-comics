@extends('layouts.base')

@section('main')
	<div class="container mt-5">
		<h1>{{ $comic->title }}</h1>
		<a class="btn btn-primary" href="{{ route('home') }}">View</a>

		<div class="mb-3">
			<img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
		</div>
		<p><strong>Description:</strong> {{ $comic->description }}</p>
		<p><strong>Price:</strong> {{ $comic->price }}</p>
		<p><strong>Series:</strong> {{ $comic->series }}</p>
		<p><strong>Sale Date:</strong> {{ $comic->sale_date }}</p>
		<p><strong>Type:</strong> {{ $comic->type }}</p>
		<p><strong>Artists:</strong></p>
		<ul>
			@foreach ($comic->artists as $artist)
				<li>
					{{ $loop->last ? $artist : $artist . ', ' }}
				</li>
			@endforeach
		</ul>
		<p><strong>Writers:</strong></p>
		<ul>
			@foreach ($comic->writers as $writer)
				<li>
					{{ $loop->last ? $writer : $writer . ', ' }}
				</li>
			@endforeach
		</ul>
	</div>
@endsection
