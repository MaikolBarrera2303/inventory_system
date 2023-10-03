
@if(!request()->routeIs("login"))
    <nav>
        <ul>
            <li><a href="">Inicio</a></li>

            @if(auth()->user()->role_id === 1)
                <li> Usuarios
                    <ul>
                        <li><a href="{{ route("users.index") }}">Listar Usuarios</a></li>
                        <li><a href="{{ route("users.create") }}">Crear Usuarios</a></li>
                    </ul>
                </li>
            @endif

            <li> Productos
                <ul>
                    <li><a href="{{ route("products.index") }}">Listar Productos</a></li>
                    <li><a href="{{ route("products.create") }}">Agregar Productos</a></li>
                    <li><a href="{{ route("products.deleted") }}">Productos Eliminados</a></li>
                </ul>
            </li>
            <li> Ventas
                <ul>
                    <li><a href="{{ route("saleOrders.index") }}">Ultimas Ventas</a></li>
                    <li><a href="{{ route("saleOrders.create") }}">Vender Productos</a></li>
                    <li><a href="">Historial de Ventas</a></li>
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

