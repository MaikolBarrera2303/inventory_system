@extends("layout.app")

@section("title","Registro Usuarios")

@section("content")

    <form action="{{ route("users.store") }}" method="post">
        @csrf
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="email">Correo Electronico</label>
        <input type="email" id="email" name="email" required>
        @error("email")
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <br>

        <label for="document">No Documento</label>
        <input type="text" id="document" name="document" required>
        @error("document")
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <br>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>
        <br>

        <label for="role_id">Rol</label>
        <select id="role_id" name="role_id" required>
            <option selected disabled value="">Seccionar Rol</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        <br>

        <button type="submit">Registrar</button>

    </form>

@endsection
