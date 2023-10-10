<div class="modal fade" id="products_show{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Producto {{ $product->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-body row g-3">

                    <label for="name">Nombre</label>
                    <input type="text" id="name" value="{{ $product->name }}" disabled>
                    <br>

                    <label for="code">Codigo</label>
                    <input type="text" id="code" value=" {{ $product->code }}" disabled>
                    <br>

                    <label for="size">Talla</label>
                    <input type="text" id="size" value="{{ $product->size }}" disabled>
                    <br>

                    <label for="quantity">Cantidad</label>
                    <input type="number" id="quantity" value="{{ $product->quantity }}" disabled>
                    @if($product->quantity <= 15)
                        <div class="alert alert-danger" role="alert">
                            Se esta agotando el producto
                        </div>
                    @endif
                    <br>

                    <label for="price">Precio</label>
                    <input type="number" id="price" value="{{ number_format($product->price,0,",",'.') }}" disabled>
                    <br>

                    <label for="tax">IVA</label>
                    <input type="text" id="tax" value="{{ $product->tax }}" disabled>
                    <br>

                    <label for="specification">Especificacion</label>
                    <textarea id="specification" disabled>{{ $product->specification }}</textarea>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
