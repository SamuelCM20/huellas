<x-app title="Términos y Condiciones">
    <div class="ContainerPrimary min-vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header text-white text-center py-4" style="background: #b4b47c;">
                    <h2 class="mb-0">{{ __('Términos y Condiciones') }}</h2>
                </div>
                <div class="card-body p-5">
                    <div class="alert alert-info" role="alert">
                        <strong>¡Atención!</strong> Lee cuidadosamente nuestros términos y condiciones antes de continuar.
                    </div>
                    <p class="lead">
                        La información proporcionada por los usuarios será utilizada exclusivamente para optimizar la experiencia de búsqueda dentro de la plataforma, ajustando las recomendaciones y los resultados según las preferencias del usuario, respetando en todo momento la confidencialidad de los datos suministrados.
                    </p>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <i class="bi bi-check-circle-fill text-success"></i> Los datos no serán compartidos con terceros sin su consentimiento.
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-check-circle-fill text-success"></i> Mantendremos altos estándares de seguridad para proteger su información.
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-check-circle-fill text-success"></i> Puede modificar o eliminar sus datos en cualquier momento.
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn button-success btn-lg mx-2 w-100" onclick="window.history.back()">
                            Volver para Registrarme
                        </button>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    Última actualización: 21 de Septiembre, 2024
                </div>
            </div>
        </div>
    </div>
</x-app>