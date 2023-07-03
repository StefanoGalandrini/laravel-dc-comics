@extends('layouts.base')

@section('main')
	<div class="container">
		<h1>Add new comic</h1>

		<a class="btn btn-primary" href="{{ route('comics.index') }}">View</a>

		<form action="{{ route('comics.update', $comic->id) }}" method="POST">
			@csrf
			@method('PUT')

			<div class="mb-3">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
					value="{{ old('title', $comic->title) }}">
				<div class="invalid-feedback">
					@error('title')
						{{ $message }}
					@enderror
				</div>
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Description</label>
				<textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $comic->description) }}</textarea>
				<div class="invalid-feedback">
					@error('description')
						{{ $message }}
					@enderror
				</div>

			</div>
			<div class="mb-3">
				<label for="thumb" class="form-label">Thumbnail URL (al momento viene generato e inserito casualmente, non
					modificare!)</label>
				<input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb"
					value="{{ old('thumb', $comic->thumb) }}">
				<div class="invalid-feedback">
					@error('title')
						{{ $message }}
					@enderror
				</div>
			</div>
			<div class="short-fields">
				<div class="mb-3">
					<label for="price" class="form-label">Price</label>
					<input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
						value="{{ old('price', $comic->price) }}">
					<div class="invalid-feedback">
						@error('price')
							{{ $message }}
						@enderror
					</div>
				</div>
				<div class="mb-3">
					<label for="series" class="form-label">Series</label>
					<input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series"
						value="{{ old('series', $comic->series) }}">
					<div class="invalid-feedback">
						@error('series')
							{{ $message }}
						@enderror
					</div>
				</div>
				<div class="mb-3">
					<label for="sale_date" class="form-label">Sale Date</label>
					<input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date"
						value="{{ old('sale_date', $comic->sale_date) }}">
					<div class="invalid-feedback">
						@error('sale_date')
							{{ $message }}
						@enderror
					</div>
				</div>
				<div class="mb-3">
					<label for="type" class="form-label">Type</label>
					<input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type"
						value="{{ old('type', $comic->type) }}">
					<div class="invalid-feedback">
						@error('type')
							{{ $message }}
						@enderror
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="mb-3">
						<label for="artists" class="form-label">Artists</label>
						<textarea class="form-control @error('artists') is-invalid @enderror" id="artists" name="artists"
						 placeholder="Enter the artists separated by commas">{{ old('artists', implode(', ', $comic->artists)) }}</textarea>
						<div class="invalid-feedback">
							@error('artists')
								{{ $message }}
							@enderror
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-3">
						<label for="writers" class="form-label">Writers</label>
						<textarea class="form-control @error('writers') is-invalid @enderror" id="writers" name="writers"
						 placeholder="Enter the writers separated by commas">{{ old('writers', implode(', ', $comic->writers)) }}</textarea>
						<div class="invalid-feedback">
							@error('writers')
								{{ $message }}
							@enderror
						</div>
					</div>
				</div>
			</div>


			<button type="submit" class="btn btn-warning">Edit</button>
		</form>
	</div>
@endsection
