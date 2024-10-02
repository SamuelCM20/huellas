<div class="row p-0 w-100 m-0 bg-light" id="contactanos">
    <div class="text-center my-2 d-flex flex-column align-items-center">
        <h2 class="subtitle-main text-uppercase">contáctanos</h2>
        <h3 class="title-main fs-2 w-75 fw-bold">Si quieres ponerte en contacto con nosotros,
             hazlo a través del formulario de contacto</h3>
    </div>

    <!-- Formulario e Imagen -->
    <div class="row justify-content-center align-items-center my-5">
        <!-- Formulario de contacto -->
        <div class="col-lg-4 col-md-6 col-12">
            <form id="contactForm">
                <div class="mb-3">
                    <label for="name" class="form-label fs-4">Nombres y apellidos</label>
                    <input type="text" class="form-control shadow-sm" id="name"
                        placeholder="Tu nombre y apellidos">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fs-4">Correo electrónico</label>
                    <input type="email" class="form-control shadow-sm" id="email"
                        placeholder="Tu correo electrónico">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label fs-4">Mensaje</label>
                    <textarea class="form-control shadow-sm" id="message" rows="4" placeholder="Tu mensaje"></textarea>
                </div>
                <button type="submit" class="btn button-success w-100">Enviar</button>
            </form>
        </div>

        <!-- Imagen de contacto -->
        <div class="col-lg-4 col-md-6 col-12 text-center mt-4 mt-lg-0">
            <img src="{{ asset('images/imagen-principal-3.jpg') }}"
                class="img-fluid rounded shadow-lg" alt="Imagen de contacto"
                style="max-width: 300px;">
        </div>
    </div>

</div>
