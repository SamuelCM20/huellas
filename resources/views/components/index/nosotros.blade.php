<div class="row p-0 w-100 m-0 bg-light" id="sobre-nosotros">
    <div class="container py-5">
        <div class="row align-items-center">
            <!-- Imagen -->
            <div class="col-lg-6 mb-4 mb-lg-0 d-flex justify-content-center">
                <img src="{{ asset('images/image-principal-2.jpg') }}" class="img-fluid rounded shadow"
                    alt="Imagen descriptiva" style="width: 400px;">
            </div>

            <!-- Acordeón -->
            <div class="col-lg-6">
                <h4 class="subtitle-main">Sobre nosotros</h4>
                <h2 class="title-main fs-1 font-weight-bold">Te contaremos más sobre nuestra empresa:
                </h2>

                <div class="accordion mt-4 shadow" id="accordionExample">
                    <!-- Primera sección -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button title-main fs-4 font-weight-bold"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                ¿Quiénes somos?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                HUELLAS es una página web de localización para mascotas (perros y/o
                                gatos) que
                                cuenta con herramientas de bùsquedas; además posee con un amplio
                                catálogo de
                                productos de aseo, cuidado y diversión para perros y gatos, en donde
                                estos se
                                comercializan y se pagan en contra-entrega.
                            </div>
                        </div>
                    </div>
                    <!-- Segunda sección -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed title-main fs-4 font-weight-bold"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                ¿Quiénes conforman la empresa?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse"
                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul>
                                    <li class="d-flex align-items-center mb-2">
                                        <img src="{{ asset('images/sebastian.jpg') }}" alt="Sebastian" class="rounded-circle me-2 img-fluid" style="width: 50px; height: 50px;">
                                        <strong>Sebastián Uscategui Mahecha</strong> - Gerente.
                                      </li>
                                      <li class="d-flex align-items-center mb-2">
                                        <img src="{{ asset('images/camila.jpg') }}" alt="Maria" class="rounded-circle me-2 img-fluid" style="width: 50px; height: 50px;">
                                        <strong>Maria Camila Urbano Aragón</strong> - Contador.
                                      </li>
                                      <li class="d-flex align-items-center mb-2">
                                        <img src="{{ asset('images/hombre.png') }}" alt="Juan" class="rounded-circle me-2" style="width: 50px; height: 50px;">
                                        <strong>Juan Pablo García Rueda</strong> - Ingeniero en sistemas.
                                      </li>
                                      <li class="d-flex align-items-center mb-2">
                                        <img src="{{ asset('images/yesly.jpg') }}" alt="Yesly" class="rounded-circle me-2 img-fluid" style="width: 50px; height: 50px;">
                                        <strong>Yesly Valeria Ordoñez Restrepo</strong> - Comunicación y Marketing.
                                      </li>
                                      <li class="d-flex align-items-center mb-2">
                                        <img src="{{ asset('images/angel.jpg') }}" alt="Angel" class="rounded-circle me-2" style="width: 50px; height: 50px;">
                                        <strong>Ángel Daniel Ruíz Pastrana</strong> - Web máster.
                                      </li>
                                      <li class="d-flex align-items-center mb-2">
                                        <img src="{{ asset('images/Tino.jpg') }}" alt="Luis" class="rounded-circle me-2" style="width: 50px; height: 50px;">
                                        <strong>Luis Ángel Rentería Rodríguez</strong> - Bienestar animal.
                                      </li>
                            
                                  </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Tercera sección -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed title-main fs-4 font-weight-bold"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                Nuestra misión
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse"
                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Mejorar la vida de los perros en situación de vulnerabilidad,
                                promoviendo su
                                bienestar, salud y seguridad. Trabajamos incansablemente para encontrar
                                hogares
                                amorosos para perros abandonados, maltratados o en riesgo. Además, nos
                                esforzamos por educar a la comunidad sobre la responsabilidad de tener
                                una
                                mascota, promoviendo la adopción responsable, la esterilización y la
                                atención
                                veterinaria adecuada. Nuestro anhelo es un mundo donde todos los perros
                                sean
                                tratados con compasión y respeto, viviendo vidas felices y saludables
                                junto a
                                familias que los amen y los cuiden.
                            </div>
                        </div>
                    </div>
                    <!-- Cuarta sección -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed title-main fs-4 font-weight-bold"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour">
                                Nuestra visión
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse"
                            aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Crear e incentivar la construcción de una comunidad comprometida con el
                                bienestar
                                animal, donde cada mascota perdida sea rápidamente localizada y reunida
                                con su
                                familia. La plataforma ofrecerá herramientas innovadoras para facilitar
                                la búsqueda y
                                promoverá la responsabilidad de la tenencia de mascotas.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>