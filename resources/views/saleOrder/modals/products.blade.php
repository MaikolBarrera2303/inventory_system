<div class="modal fade" id="products{{ $sale->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Factura: {{ $sale->number_facture }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-body row g-3">

                    @foreach(json_decode($sale->products) as $key => $product)
                        <div class="mb-4">
                            <h6>Producto {{ $product->name_product }}</h6>
                            <div class="mb-2">
                                <strong>Código:</strong> {{ $product->code_product }}
                            </div>
                            <div class="mb-2">
                                <strong>Nombre:</strong> {{ $product->name_product }}
                            </div>
                            <div class="mb-2">
                                <strong>Cantidad:</strong> {{ $product->quantity }}
                            </div>
                            <div class="mb-2">
                                <strong>Precio Unitario:</strong> {{ "$ ".number_format($product->price,0,",",'.') }}
                            </div>
                            <div class="mb-2">
                                <strong>IVA:</strong> {{ ($product->tax*100)."%" }}
                            </div>
                            <div class="mb-2">
                                <strong>Precio Total:</strong> {{ "$ ".number_format($product->totalPrice,0,",",'.') }}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

