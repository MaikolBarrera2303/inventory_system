<div class="modal fade" id="products_quantity{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Cantidad</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-body row g-3">
                    <form class="row g-3" action="{{ route("products.quantity", $product->id) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('PUT')

                        <!-- Quantity Input -->
                        <div class="col-12">
                            <label for="quantity" class="form-label">Ingresar Cantidad</label>
                            <input type="number" id="quantity" name="quantity" class="form-control">
                        </div>

                        <!-- Submit Button (Centered) -->
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

