<x-app title="Error al procesar datos">
    <section class="ContainerPrimary p-3">
        <div class="card p-5 m-5">
            <div class="card-body d-flex justify-content-center flex-wrap">
                <img src="{{asset('images/sorry.png')}}" alt="no-disponible" class="rounded-circle img-fluid w-25">
                <div class="w-100 d-flex justify-content-center flex-wrap my-4">
                    <h1>400 - Ocurrió un error al procesar los datos.</h1>
                </div>
                <a href="/" class="btn button-success">Volver al inicio</a>
            </div>
        </div>
    </section>
</x-app>