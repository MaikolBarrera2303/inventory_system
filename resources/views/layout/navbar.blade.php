@if(!request()->routeIs("login"))

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route("saleOrders.index") }}">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @if(auth()->user()->role_id === 1)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Usuarios
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route("users.index") }}">Listar Usuarios</a></li>
                                <li><a class="dropdown-item" href="{{ route("users.create") }}">Crear Usuarios</a></li>
                            </ul>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route("products.index") }}">Listar Productos</a></li>
                            <li><a class="dropdown-item" href="{{ route("products.create") }}">Agregar Productos</a></li>
                            <li><a class="dropdown-item" href="{{ route("products.deleted") }}">Productos Eliminados</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ventas
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route("saleOrders.index") }}">Historico Ventas</a></li>
                            <li><a class="dropdown-item" href="{{ route("saleOrders.create") }}">Vender Productos</a></li>
                        </ul>
                    </li>

                </ul>
                    <form class="d-flex" method="post" action="{{ route("logout") }}">
                        @csrf
                        <span class="me-5" style="margin-top: 6px">{{ auth()->user()->name  }}</span>
                        <button class="btn btn-outline-danger" type="submit">Cerrar sesion</button>
                    </form>
            </div>
        </div>
    </nav>
@endif
