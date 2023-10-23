@extends("layout.app")

@section("title","Venta")

@section("content")

    @include("layout.messages")

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-4">
                <form action="{{ route("saleOrders.addCart") }}" method="post" autocomplete="off" class="mb-4">
                    @csrf
                    <div class="mb-3">
                        <input type="text" id="code_product" name="code_product" class="form-control" placeholder="Código" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Cantidad" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </form>
            </div>
            <div class="col-md-8">
                <div class="table-responsive">-
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">CODIGO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">CANTIDAD</th>
                            <th scope="col">PRECIO UNITARIO CON IVA</th>
                            <th scope="col">IVA</th>
                            <th scope="col">TOTAL</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <th scope="row">{{ $item["code_product"] }}</th>
                                <td>{{ $item["name_product"] }}</td>
                                <td>{{ $item["quantity"] }}</td>
                                <td>{{ "$ ".number_format(($item["price"]), 0, ",", '.') }}</td>
                                <td>{{ ($item["tax"]*100)."%" }}</td>
                                <td>{{ "$ ".number_format($item["totalPrice"], 0, ",", '.') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Total: {{ "$ ".number_format($total, 0, ",", '.') }}</h4>

                <form action="{{ route("saleOrders.sales") }}" class="btn" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success mt-4">Procesar Venta</button>
                </form>

                <form action="{{ route("saleOrders.emptyCart") }}" class="btn" method="post">
                    @csrf
                    @method("PATCH")
                    <button type="submit" class="btn btn-danger mt-4">Cancelar Venta</button>
                </form>
            </div>
        </div>

    </div>



@endsection
