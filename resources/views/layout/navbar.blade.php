
@if(!request()->routeIs("login"))
    <nav>
        <ul>
            <li><a href="">Inicio</a></li>
            <li> Usuarios
                <ul>
                    <li><a href="{{ route("users.index") }}">Listar Usuarios</a></li>
                    <li><a href="{{ route("users.create") }}">Crear Usuarios</a></li>
                </ul>
            </li>
            <li> Productos
                <ul>
                    <li><a href="{{ route("products.index") }}">Listar Productos</a></li>
                    <li><a href="{{ route("products.create") }}">Agregar Productos</a></li>
                </ul>
            </li>
        </ul>
        <ul>
            Hola  {{ auth()->user()->name  }}
            <form method="post" action="{{ route("logout") }}">
                    @csrf
                    <button type="submit">Cerrar sesion</button>
            </form>
        </ul>
    </nav>
@endif

