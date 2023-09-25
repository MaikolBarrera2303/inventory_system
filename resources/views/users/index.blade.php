@extends("layout.app")

@section("title","Usuarios")

@section("content")

    Hola
    <br>
    Inicio de sesion
    <br>
    <a href="{{ route("users.create") }}">Crear Usuarios</a>

    <form method="post" action="{{ route("logout") }}">
        @csrf
        <button type="submit">Cerrar sesion</button>
    </form>

@endsection
