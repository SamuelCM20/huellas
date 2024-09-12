<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	{{-- csrf Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{env('APP_NAME')}} | {{$title ?? 'tienda virtual colombia'}}</title>

	{{-- Scripts --}}
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="cuerpo">

	<div class="bg" style="flex-direction: column; min-height: 100vh;">

		{{-- Menu --}}
		<x-menu />

		{{-- Content --}}
		<main id="app" class="">
			<div class="container">
				<x-alerts />
			</div>

			{{ $slot}}

		</main>
        <script src="{{ asset('js/slider.js') }}"></script>
		
	</div>

	<x-footer />
	
	</body>
	<script src="{{ asset('js/localStorageUtils.js') }}"></script>
</html>