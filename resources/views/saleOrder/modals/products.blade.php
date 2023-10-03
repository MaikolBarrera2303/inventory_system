<div class="modal fade" id="products{{ $sale->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Factura : {{ $sale->number_facture }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-body row g-3">

                    @foreach(json_decode($sale->products) as $key => $product)
                        <h6>Producto {{ $product->name_product }}</h6>
                        <span>
                            Codigo: {{ $product->code_product }} <br>
                            Precio: {{ $product->name_product }} <br>
                            Cantidad: {{ $product->quantity }} <br>
                            Precio Unitario: {{ "$ ".number_format($product->price,0,",",'.') }} <br>
                            Precio total: {{ "$ ".number_format($product->totalPrice,0,",",'.') }} <br>
                        </span>
                        <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
