<div class="modal fade" id="products_edit{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar {{ $product->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-body row g-3">
                    <form action="{{ route("products.update", $product->id) }}" method="post">
                        @csrf
                        @method("PUT")

                        <div class="col-12">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" id="name" class="form-control" value="{{ $product->name }}" disabled>
                        </div>

                        <div class="col-12">
                            <label for="code" class="form-label">Codigo</label>
                            <input type="text" id="code" class="form-control" value="{{ $product->code }}" disabled>
                        </div>

                        <div class="col-12">
                            <label for="size" class="form-label">Talla</label>
                            <input type="text" id="size" class="form-control" value="{{ $product->size }}" disabled>
                        </div>

                        <div class="col-12">
                            <label for="quantity" class="form-label">Cantidad</label>
                            <input type="number" id="quantity" class="form-control" value="{{ $product->quantity }}" disabled>
                        </div>

                        <div class="col-12">
                            <label for="price" class="form-label">Precio</label>
                            <input type="number" id="price" name="price" class="form-control" value="{{ intval($product->price) }}" required>
                        </div>

                        <div class="col-12">
                            <label for="tax" class="form-label">IVA</label>
                            <input type="text" id="tax" class="form-control" value="{{ $product->tax }}" disabled>
                        </div>

                        <div class="col-12">
                            <label for="specification" class="form-label">Especificación</label>
                            <textarea id="specification" class="form-control" disabled>{{ $product->specification }}</textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
