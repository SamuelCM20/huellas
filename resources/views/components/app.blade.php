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

	<div class="bg" style="flex-direction: column;">
		{{-- min-height: 100vh; --}}

		{{-- Menu --}}
		<x-menu />

		{{-- Content --}}
		<main id="app">
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
	<script>
		function limitText(elements, limit) {
            elements.forEach(function(element) {
                var text = element.textContent;
                if (text.length > limit) {
                    element.textContent = text.substring(0, limit) + '...';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            var titles = document.querySelectorAll('.product-title');
            var descriptions = document.querySelectorAll('.product-details');

            // Limitar los títulos a 20 caracteres
            limitText(titles, 20);

            // Limitar las descripciones a 60 caracteres
            limitText(descriptions, 30);


			@if(session('success'))
       		 Swal.fire({
            icon: 'success',
            title: '¡Mensaje enviado!',
            text: '{{ session('success') }}',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#007bff',
            timer: 3000
        });
    @endif
        });
    </script>
</html>