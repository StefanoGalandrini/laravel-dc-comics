@extends('layouts.base')

@section('main')
	<div class="container">
		<h1>Add new comic</h1>
		<a class="btn btn-primary" href="{{ route('home') }}">View</a>

		<form action="{{ route('comics.store') }}" method="POST">
			@csrf
			<div class="mb-3">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control" id="title" name="title">
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">Description</label>
				<textarea class="form-control" id="description" name="description"></textarea>
			</div>
			<div class="mb-3">
				<label for="thumb" class="form-label">Thumbnail URL</label>
				<input type="text" class="form-control" id="thumb" name="thumb">
			</div>
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
			<div class="mb-3">
				<label for="artists" class="form-label">Artists</label>
				<textarea class="form-control" id="artists" name="artists"></textarea>
				<div class="form-text">Enter the artists separated by commas</div>
			</div>
			<div class="mb-3">
				<label for="writers" class="form-label">Writers</label>
				<textarea class="form-control" id="writers" name="writers"></textarea>
				<div class="form-text">Enter the writers separated by commas</div>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection