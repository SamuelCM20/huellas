<x-app title="No autenticado">
    <section class="ContainerPrimary p-3">
        <div class="card p-5 m-5">
            <div class="card-body d-flex justify-content-center flex-wrap">
                <img src="{{asset('images/sorry.png')}}" alt="no-disponible" class="rounded-circle img-fluid w-25">
                <div class="w-100 d-flex justify-content-center flex-wrap my-4">
                    <h1>401 - Debes estar autenticado para poder seguir.</h1>
                </div>
                <a href="/" class="btn button-success">Volver al inicio</a>
            </div>
        </div>
    </section>
</x-app>