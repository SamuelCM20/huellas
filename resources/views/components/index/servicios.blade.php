<div class="row p-0 w-100 m-0 " style="background: #f0f0f0;" id="servicios">

    <div class="col-9 mt-5 w-100">
        <h1 class="fw-bolder h4 mx-1">Servicios de la página</h1>
        <h2 class="title-main h1 display-6 my-5 text-center">
            ¿Qué servicios ofrecemos en la página?
        </h2>
    </div>
    <div class="col">
        {{-- <swiper-slider> --}}
        <div class="container py-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <!-- Contenido del carrusel -->
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <div class="row align-items-center justify-content-center gap-5">
                            <div class="col-md-3 text-center">
                                <img src="{{ asset('images/dispositivos1.png') }}" class="img-fluid"
                                    alt="Servicio 1" style="max-width: 300px;">
                                <!-- Ajusta el tamaño de la imagen -->
                            </div>
                            <div class="col-md-4">
                                <div style="max-width: 400px; font-size: 16px;">
                                    <p>Nuestro sitio web ofrece una funcionalidad única que facilita la búsqueda
                                        y
                                        Reunión de mascotas perdidas con sus familias amorosas. desde perros y
                                        gatos.
                                        Nuestro objetivo es brindar esperanza y alivio en momentos de angustia.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row align-items-center justify-content-center gap-5">
                            <div class="col-md-3 text-center">
                                <img src="{{ asset('images/dispositivos2.png') }}" class="img-fluid mb-3"
                                    alt="Servicio 1" style="max-width: 300px;">
                                <!-- Ajusta el tamaño de la imagen -->
                            </div>
                            <div class="col-md-4">
                                <div style="max-width: 400px; font-size: 16px;">
                                    <p>Ofrecemos un sitio de venta de productos, donde encontrarás una amplia
                                        variedad de productos para cuidar,
                                        consentir y mantener a tus mascotas felices. Navega por nuestras
                                        categorías y descubre productos de calidad diseñados para
                                        todo tipo de mascota.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row align-items-center justify-content-center gap-5">
                            <div class="col-md-3 text-center">
                                <img src="{{ asset('images/dispositivos3.png') }}" class="img-fluid"
                                    alt="Servicio 1" style="max-width: 300px;">
                                <!-- Ajusta el tamaño de la imagen -->
                            </div>
                            <div class="col-md-4">
                                <div style="max-width: 400px; font-size: 16px;">
                                    <p>Contamos con un apartado donde puedes publicar detalles para ayudar en la
                                        búsqueda de tu mascota.
                                        Dando información sobre la raza, el color, ultimo lugar visto y
                                        cualquier característica especial que ayude a identificarla.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="carousel-indicators" style="position: static; margin: 4rem 0;">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
            </div>
        </div>