@extends("layout.app")

@section("title","Registro Usuarios")

@section("content")

    <form action="{{ route("products.store") }}" method="post">
        @csrf
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" required>
        @error("name")
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <br>

        <label for="code">Codigo</label>
        <input type="text" id="code" name="code" required>
        @error("code")
        <div class="alert alert-danger" role="alert">
            {{ $message }}
        </div>
        @enderror
        <br>

        <label for="size">Talla</label>
        <input type="text" id="size" name="size" required value="{{ old("size") }}">
        <br>

        <label for="quantity">Cantidad</label>
        <input type="number" id="quantity" name="quantity" required value="{{ old("quantity") }}">
        <br>

        <label for="price">Precio</label>
        <input type="number" id="price" name="price" required value="{{ old("price") }}">
        <br>

        <label for="specification">Especificacion</label>
        <textarea id="specification" name="specification" required>{{ old("specification") }}</textarea>
        <br>


        <button type="submit">Guardar</button>

    </form>

@endsection
