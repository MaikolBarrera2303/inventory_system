@extends("layout.app")

@section("title","Registro Usuarios")

@section("content")

    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col">
                <div class="form-container">
                    <form action="{{ route("users.store") }}" method="post">
                        @csrf

                        <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required value="{{ old("name")}}">
                        <br>

                        <input type="email" id="email" name="email" class="form-control" placeholder="Correo Electrónico" required>
                        <br>
                        @error("email")
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <br>

                        <input type="text" id="document" name="document" class="form-control" placeholder="No Documento" required>
                        <br>
                        @error("document")
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                        <br>

                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                        <br>

                        <select id="role_id" name="role_id" class="form-control" required>
                            <option selected disabled value="">Seleccionar Rol</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <br>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
