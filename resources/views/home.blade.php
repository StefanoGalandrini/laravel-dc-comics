<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel DC Comics</title>
	@vite('resources/js/app.js')
</head>

<body>
	<div class="bkg">
		<div class="overlay">
			<h1 class="main-title">DC COMICS</h1>
			<p class="descript">Esplora la nsotra collezione di fumetti</p>
			<p class="descript">cliccando sul bottone qui sotto</p>
			<a class="btn btn-danger action-button" href="{{ route('comics.index') }}">View</a>
		</div>
	</div>
</body>

</html>
