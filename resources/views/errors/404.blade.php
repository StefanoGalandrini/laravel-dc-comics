<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel DC Comics</title>
	@vite('resources/js/app.js')
</head>

<body>
	<div class="error-bkg">
		<div class="error-overlay">
			<div class="error-flex">
				<div class="left-side">
					<h1 class="error-title">DC COMICS</h1>
					<a class="btn btn-primary action-button" href="{{ route('home') }}">Home</a>
				</div>
				<div class="right-side">
					<h2 class="error-type">ERRORE 404</h2>
					<p class="error-descript">not found...</p>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
