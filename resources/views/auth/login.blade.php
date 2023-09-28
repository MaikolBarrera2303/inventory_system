@extends("layout.app")

@section("title","Login")

@section("content")

    @include("layout.messages")

    {{--
    Formulario para el Login , no modificar :
        - lo que esta dentro {{  }}
        - nombres de los campos
        - @csrf
        - method del formulario
    --}}
    <form action="{{ route("login") }}" method="post" autocomplete="off">
        @csrf
        <label for="document">No Documento</label>
        <input type="text" name="document" id="document" required>
        <br>
        <label for="password">Contraseña</label>
        <input id="password" name="password" type="password" required>
        <br>
        <button type="submit">Iniciar Sesion</button>
    </form>

@endsection
