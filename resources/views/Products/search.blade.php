<x-app title="Resultados para {{ $query }}">
    <div class="defaultContainer">
    <navbar-shop>
    </navbar-shop>

    <div class="my-3 mx-4">
        <div>
            <h1 class="h2 fw-bolder">{{ $query }}</h1>
            <p class="text-body">{{ $count }} resultados</p>
        </div>
        <div class="row justify-content-start gx-1 gy-2 m-3">

			@if (count($result) > 0)
            @foreach ($result as $product)
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-2">

                    <a href="{{ route('products.info', $product->id) }}" class="text-decoration-none text-reset">
                        <div class="card shadow-sm h-100" style="max-width: 180px;">
                            <img src="{{ $product->file->route }}" class="card-img-top img-fluid" alt="imagen-producto"
                                style="object-fit: cover; height: 150px;">
                            <div class="card-body text-center">
                                <h2 class="card-title h6 fw-bold product-title">{{ $product->name }}</h2>
                                <p class="card-text product-details" style="font-size: 0.9rem;">{{ $product->details }}.
                                </p>
                                <h3 class="card-text fs2">${{ $product->price }}.</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

			@else
				<div class="text-center p-4 my-5">

					<h2>No hay resultados para la búsqueda.</h2>

                    <p>Por favor intente con otro término de búsqueda.</p>

                    <a href="{{ route('products.home') }}">Volver a la lista de productos</a>

				</div>
			@endif

        </div>
    </div>
</x-app>
