<div class="modal fade" id="products_edit{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar {{ $product->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-body row g-3">

                    <form action="{{ route("products.update",$product->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <label for="name">Nombre</label>
                        <input type="text" id="name" value="{{ $product->name }}" disabled>
                        <br>

                        <label for="code">Codigo</label>
                        <input type="text" id="code" value="{{ $product->code }}" disabled>
                        <br>

                        <label for="size">Talla</label>
                        <input type="text" id="size" value="{{ $product->size }}" disabled>
                        <br>

                        <label for="quantity">Cantidad</label>
                        <input type="number" id="quantity" value="{{ $product->quantity }}" disabled>
                        <br>

                        <label for="price">Precio</label>
                        <input type="number" id="price" name="price" value="{{ $product->price }}" required>
                        <br>

                        <label for="specification">Especificacion</label>
                        <textarea id="specification" disabled>{{ $product->specification }}</textarea>
                        <br>

                        <button type="submit">Actualizar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
