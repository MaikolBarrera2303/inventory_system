@extends("layout.app")

@section("title","Venta")

@section("content")

    @include("layout.messages")

    <form action="{{ route("sale-orders.store") }}" method="post" autocomplete="off">
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
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>

        @foreach($cart as $item)
            <tr>
                <th scope="row">{{ $item["code_product"] }}</th>
                <td>{{ $item["name_product"] }}</td>
                <td>{{ $item["quantity"] }}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
