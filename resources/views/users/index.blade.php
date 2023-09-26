@extends("layout.app")

@section("title","Usuarios")

@section("content")

    @if(session("success"))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
    @endif

    @if(session("error"))
        <div class="alert alert-danger" role="alert">
            {{ session("error") }}
        </div>
    @endif

    Hola  {{ auth()->user()->name  }}
    <br>
    Inicio de sesion
    <br>
    <a href="{{ route("users.create") }}">Crear Usuarios</a>

    <form method="post" action="{{ route("logout") }}">
        @csrf
        <button type="submit">Cerrar sesion</button>
    </form>

@endsection
