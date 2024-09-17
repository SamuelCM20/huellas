<x-app title="Inicio de sesión">
    <div class="ContainerPrimary d-flex justify-content-center align-items-center p-4">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <div class="text-center">
                <img src="{{asset('images/iconoCirculoVerde.png')}}" alt="Logo" class="mb-3" style="width: 80px;">
            </div>
            <h3 class="text-center mb-4">{{ __('Inicio de sesión') }}</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Correo electrónico -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Correo electronico') }}</label>
                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="Ingresa tu correo electronico" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Ingresa tu contraseña">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                </div>

                <!-- Botón Ingresar -->
                <div class="row mb-0">
                    <div>
                        <button type="submit" class="btn button-success w-100">
                            {{ __('Ingresar') }}
                        </button>
                    </div>
                </div>
                <div class="row d-flex text-center">
                    <div class="mt-3">
                        <p>No tienes cuenta? <span><a href="{{route('register')}}" class="text-decoration-none">Crea cuenta</a></span></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app> 
