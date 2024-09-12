<x-app title="Home">
    <section>

        <div class="row p-0 position-relative w-100 m-0">

            <img src="/storage/images/images/bannerSinTexto.png" alt="banner"
                class="banner-img position-relative img-fluid w-100 p-0 m-0">


            <div
                class="text-banner position-absolute w-50 h-100 text-white text-center d-flex flex-column justify-content-center top-0 start-50">
                <h1 class="title-banner display-1 fw-bold mb-2 animated-text">Huellas</h1>
                <p class="p-banner lead animated-text">El sitio web dedicado al cuidado y
                    bienestar de nuestras mascotas</p>
            </div>
        </div>

        <div class="row p-0 w-100 m-0 " style="background: #f0f0f0;">

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
                                        <img src="/storage/images/images/iconopc.png" class="img-fluid" alt="Servicio 1"
                                            style="max-width: 300px;"> <!-- Ajusta el tamaño de la imagen -->
                                    </div>
                                    <div class="col-md-4">
                                        <div style="max-width: 400px; font-size: 16px;">
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae, quia. Ea
                                                expedita autem voluptas, accusamus, provident, magnam quos nisi quo ad
                                                dignissimos autem! Debitis, nemo.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row align-items-center justify-content-center gap-5">
                                    <div class="col-md-3 text-center">
                                        <img src="/storage/images/images/iconopc.png" class="img-fluid" alt="Servicio 1"
                                            style="max-width: 300px;"> <!-- Ajusta el tamaño de la imagen -->
                                    </div>
                                    <div class="col-md-4">
                                        <div style="max-width: 400px; font-size: 16px;">
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae, quia. Ea
                                                expedita autem voluptas, accusamus, provident, magnam quos nisi quo ad
                                                dignissimos autem! Debitis, nemo.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row align-items-center justify-content-center gap-5">
                                    <div class="col-md-3 text-center">
                                        <img src="/storage/images/images/iconopc.png" class="img-fluid" alt="Servicio 1"
                                            style="max-width: 300px;"> <!-- Ajusta el tamaño de la imagen -->
                                    </div>
                                    <div class="col-md-4">
                                        <div style="max-width: 400px; font-size: 16px;">
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae, quia. Ea
                                                expedita autem voluptas, accusamus, provident, magnam quos nisi quo ad
                                                dignissimos autem! Debitis, nemo.</p>
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

                <div class="row p-0 w-100 m-0 bg-light">
                    <div class="container py-5">
                        <div class="row align-items-center">
                            <!-- Imagen -->
                            <div class="col-lg-6 mb-4 mb-lg-0 d-flex justify-content-center">
                                <img src="/storage/images/images/image-principal-2.jpg" class="img-fluid rounded shadow"
                                    alt="Imagen descriptiva" style="max-width: 400px;">
                            </div>

                            <!-- Acordeón -->
                            <div class="col-lg-6">
                                <h4 class="subtitle-main">Sobre nosotros</h4>
                                <h2 class="title-main fs-1 font-weight-bold">Te contaremos más sobre nuestra empresa:</h2>

                                <div class="accordion mt-4 shadow" id="accordionExample">
                                    <!-- Primera sección -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button title-main fs-4 font-weight-bold" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                ¿Quiénes somos?
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam...
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Segunda sección -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed title-main fs-4 font-weight-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                ¿Quiénes conforman la empresa?
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Aquí irá el texto correspondiente a quiénes conforman la empresa...
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tercera sección -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed title-main fs-4 font-weight-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                Nuestra misión
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Aquí irá el texto correspondiente a la misión de la empresa...
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Cuarta sección -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed title-main fs-4 font-weight-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                Nuestra visión
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Aquí irá el texto correspondiente a la visión de la empresa...
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="row p-0 w-100 m-0 bg-light">
                        
                    </div> 
            
                </section>
</x-app>
