@extends("layout.app")

@section("title","Registro Usuarios")

@section("content")
    <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
        <form action="{{ route("products.store") }}" method="post" class="w-50">
        @csrf

            <!-- Nombre -->
            <div class="mb-3">
                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required>
                @error("name")
                <div class="alert alert-danger mt-2" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Codigo -->
            <div class="mb-3">
                <input type="text" id="code" name="code" class="form-control" placeholder="Codigo" required>
                @error("code")
                <div class="alert alert-danger mt-2" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Talla -->
            <div class="mb-3">
                <input type="text" id="size" name="size" class="form-control" placeholder="Talla" value="{{ old("size") }}">
            </div>

            <!-- Cantidad -->
            <div class="mb-3">
                <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Cantidad" value="{{ old("quantity") }}" required>
            </div>

            <!-- Precio sin IVA -->
            <div class="mb-3">
                <input type="number" id="price" name="price" class="form-control" placeholder="Precio sin IVA" value="{{ old("price") }}" required>
            </div>

            <!-- IVA -->
            <div class="mb-3">
                <input type="text" id="tax" name="tax" class="form-control" placeholder="IVA" value="{{ old("tax") }}" required>
                @error("tax")
                <div class="alert alert-danger mt-2" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Especificación -->
            <div class="mb-3">
                <textarea id="specification" name="specification" class="form-control" placeholder="Especificación" required>{{ old("specification") }}</textarea>
            </div>

            <!-- Submit Button (Centered) -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
    </form>
    </div>


@endsection
