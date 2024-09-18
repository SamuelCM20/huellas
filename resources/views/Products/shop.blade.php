<x-app title="Tienda electronica | home">

    <x-menuShop />
    <img src="{{ asset('images/Logodecompras.jpg') }}" alt="banner"
        class="banner-img position-relative img-fluid w-100 p-0 m-0">
    @foreach ($categories as $cate)
    @php
        $count = 0;
    @endphp
    <div class="my-4 mx-2">
        <div class="d-flex align-items-center my-2 mx-3">
            <h1 class="h1">{{ $cate->name }}</h1>
            <a href="{{route('categories.allProducts', $cate->id)}}" class="btn btn-outline-secondary ms-auto">Ver todo</a>
        </div>
        <div class="row justify-content-start gx-1 gy-2 m-3">
            @foreach ($products as $product)
                @if ($product->category->name == $cate->name && $count < 6)
                    @php
                        $count++;
                    @endphp
                    <!-- Columna para cada tarjeta -->
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-2">
                        <a href="{{route('products.info', $product->id)}}" class="text-decoration-none text-reset">
                            <div class="card shadow-sm h-100" style="max-width: 180px;">
                                <img src="{{ $product->file->route }}" class="card-img-top img-fluid" alt="imagen-producto" style="object-fit: cover; height: 150px;">
                                <div class="card-body text-center">
                                    <h2 class="card-title h6 fw-bold product-title">{{ $product->name }}</h2>
                                    <p class="card-text product-details" style="font-size: 0.9rem;">{{ $product->details }}.</p>
                                    <h3 class="card-text fs2">${{ $product->price }}.</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endforeach


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
        });
    </script>

</x-app>
