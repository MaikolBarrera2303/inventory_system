<div class="modal fade" id="products_delete{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar {{ $product->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-body row g-3">
                    <form class="row g-3" action="{{ route("products.destroy",$product->id) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('DELETE')

                        <!-- ID Rol -->
                        <div class="col-12">
                            <label for="current_password">Ingresar Contraseña</label>
                            <input type="number" id="current_password" name="current_password">
                        </div>

                        <div class="col-12">
                            <div class="d-grid">
                                <button type="submit" id="button_register">Eliminar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
