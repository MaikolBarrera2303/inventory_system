@extends("layout.app")

@section("title","Login")

@section("content")

    @include("layout.messages")

    <div class="container" style="margin-top: 100px">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route("login") }}" method="post" autocomplete="off" class="p-3 rounded bg-light">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="document">No Documento</label>
                        <input type="text" name="document" id="document" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Contraseña</label>
                        <input id="password" name="password" type="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>






@endsection
