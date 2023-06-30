@extends('layouts.base')

@section('main')
	<div class="container">
		<h1>Add new comic</h1>

		<a class="btn btn-primary" href="{{ route('comics.index') }}">View</a>

		<form action="{{ route('comics.store') }}" method="POST">
			@csrf

			<div class="mb-3">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control is-invalid" @error('title') is-invalid @enderror id="title"
					name="title" value="{{ old('title') }}" <div class="invalid-feedback">
				@error('title')
					{{ $message }}
				@enderror
			</div>
	</div>
	<div class="mb-3">
		<label for="description" class="form-label">Description</label>
		<textarea class="form-control" id="description" name="description"></textarea>
	</div>
	<div class="mb-3">
		<label for="thumb" class="form-label">Thumbnail URL</label>
		<input type="text" class="form-control" id="thumb" name="thumb">
	</div>
	<div class="short-fields">
		<div class="mb-3">
			<label for="price" class="form-label">Price</label>
			<input type="text" class="form-control" id="price" name="price">
		</div>
		<div class="mb-3">
			<label for="series" class="form-label">Series</label>
			<input type="text" class="form-control" id="series" name="series">
		</div>
		<div class="mb-3">
			<label for="sale_date" class="form-label">Sale Date</label>
			<input type="date" class="form-control" id="sale_date" name="sale_date">
		</div>
		<div class="mb-3">
			<label for="type" class="form-label">Type</label>
			<input type="text" class="form-control" id="type" name="type">
		</div>
	</div>
	<div class="mb-3">
		<label for="artists" class="form-label">Artists</label>
		<textarea class="form-control" id="artists" name="artists" placeholder="Enter the artists separated by commas"></textarea>
	</div>
	<div class="mb-3">
		<label for="writers" class="form-label">Writers</label>
		<textarea class="form-control" id="writers" name="writers" placeholder="Enter the writers separated by commas"></textarea>
	</div>

	<button type="submit" class="btn btn-warning">Submit</button>
	</form>
	</div>
@endsection
