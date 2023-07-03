@extends('layouts.base')

@section('main')
	<div class="show-container mt-2">
		<h1>{{ $comic->title }}</h1>
		<div>
			<a class="btn btn-warning" href="{{ route('comics.index') }}">View</a>
			<a class="btn btn-danger action-button" href="{{ route('comics.edit', ['comic' => $comic->id]) }}">Edit</a>
		</div>


		<div class="show-content">
			<div class="image-container">
				<img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
			</div>
			<div class="show-text-container">
				<p class="description info-text">Description: <span class="info-value">{{ $comic->description }}</span></p>

				<div class="info">
					<div class="left">
						<p class="info-text">Price: <span class="info-value">{{ $comic->price }}</span></p>
						<p class="info-text">Series: <span class="info-value">{{ $comic->series }}</span></p>
						<p class="info-text">Sale Date: <span class="info-value">{{ $comic->sale_date }}</span></p>
						<p class="info-text">Type: <span class="info-value">{{ $comic->type }}</span></p>
					</div>
					<div class="middle">
						<p class="info-text">Artists:</p>
						<ul>
							@foreach ($comic->artists as $artist)
								<li>
									<span class="info-value">{{ $loop->last ? $artist : $artist . ', ' }}</span>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="right">
						<p class="info-text">Writers:</p>
						<ul>
							@foreach ($comic->writers as $writer)
								<li>
									<span class="info-value">{{ $loop->last ? $writer : $writer . ', ' }}</span>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
