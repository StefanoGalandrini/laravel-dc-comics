@extends('layouts.base')

@section('main')
	<h1 class="main-title">DC COMICS</h1>

	<p>HOME PAGE</p>
	<a class="btn btn-primary action-button" href="{{ route('comics.index') }}">View</a>
@endsection
