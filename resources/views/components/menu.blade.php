<nav class="navbar navbar-expand-lg  navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/   ') }}">
            <img src="{{asset('images/logoPrincipalColor.png')}}" alt="Logo" width="165" height="55"
                class="d-inline-block align-text-top">
        </a>

        @if (!Request::is('login', 'register', 'password/reset', 'password/email'))
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link fs-5 mx-3" href="{{ route('login') }}">Inicia sesión</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link fs-5 mx-3" href="{{ route('register') }}">Regístrate</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link fs-5 mx-1" href="{{ url('/   ') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 mx-1" href="{{route('products.home')}}">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 mx-1" href="{{route('publications.index')}}">Publicaciones</a>
                        </li>

                        <li class="nav-item dropdown" style="margin-right: 1.2rem;">
                            <a class="nav-link dropdown d-flex align-items-center fs-5 nav-link-user" style="color:black;"
                                href="#mi-cuenta" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="{{ Auth::user()->file->route }}" alt="avatar-user" width="30" height="30"
                                    class="d-inline-block align-text-top rounded-circle me-2">
                                <span class="user-name">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down ms-2 arrow-icon fs-6"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('users.profile') }}">Perfil</a></li>
                                @role('admin')
                                    <li><a class="dropdown-item" href="{{ route('users.index') }}">Usuarios</a></li>
                                    <li><a class="dropdown-item" href="{{ route('products.index') }}">Productos</a></li>
                                    <li><a class="dropdown-item" href="{{ route('categories.index') }}">Categorias</a></li>
                                @endrole
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item f-bolder" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                                        sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>

                        </li>
                    @endguest
                </ul>
            </div>
        @endif
    </div>
</nav>
