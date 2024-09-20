<x-app title="Home">
    <section>

        <div class="row p-0 position-relative w-100 m-0" id="inicio">

            <img src="{{ asset('images/bannerSinTexto.png') }}" alt="banner"
                class="banner-img position-relative img-fluid w-100 p-0 m-0">


            <div
                class="text-banner position-absolute w-50 h-100 text-white text-center d-flex flex-column justify-content-center top-0 start-50">
                <h1 class="title-banner display-1 fw-bold mb-2 animated-text">Huellas</h1>
                <p class="p-banner lead animated-text">El sitio web dedicado al cuidado y
                    bienestar de nuestras mascotas</p>
            </div>
        </div>

                    {{-- Nuestros servicios --}}
                    <x-index.servicios />
                    {{-- sobre nosotros --}}
                   <x-index.nosotros />
                   {{-- contactanos --}}
                   <x-index.contactanos />

    </section>

</x-app>
