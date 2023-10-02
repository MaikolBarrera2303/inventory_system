@extends("layout.app")

@section("title","Venta")

@section("content")

    @include("layout.messages")

    <form action="{{ route("saleOrders.addCart") }}" method="post" autocomplete="off">
        @csrf
        <label for="code_product">Codigo</label>
        <input type="text" id="code_product" name="code_product">
        <label for="quantity">Cantidad</label>
        <input type="number" id="quantity" name="quantity">
        <button type="submit">Agregar Producto</button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">CODIGO</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">PRECIO UNITARIO</th>
            <th scope="col">TOTAL</th>
        </tr>
        </thead>
        <tbody>

        @foreach($cart as $item)
            <tr>
                <th scope="row">{{ $item["code_product"] }}</th>
                <td>{{ $item["name_product"] }}</td>
                <td>{{ $item["quantity"] }}</td>
                <td>{{ "$ ".number_format($item["price"],0,",",'.') }}</td>
                <td>{{ "$ ".number_format($item["totalPrice"],0,",",'.') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h4 style="margin: 40px">Total: {{ "$ ".number_format($total,0,",",'.') }}</h4>

    <form style="margin-top: 60px">
        <button>Procesar Venta</button>
    </form>

    <form action="{{ route("saleOrders.emptyCart") }}" method="post">
        @csrf
        @method("PATCH")
        <button>Cancelar venta</button>
    </form>



@endsection
