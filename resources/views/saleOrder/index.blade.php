@extends("layout.app")

@section("title","Ultimas ventas")

@section("content")

    <table class="table">
        <thead>
        <tr>
            <th scope="col">No FACTURA</th>
            <th scope="col">FECHA</th>
            <th scope="col">RESPONSABLE</th>
            <th scope="col">TOTAL</th>
            <th scope="col">PRODUCTOS</th>
        </tr>
        </thead>
        <tbody>

        @foreach($sales as $sale)
            <tr>
                <th scope="row">{{ $sale->number_facture }}</th>
                <td>{{ $sale->date_sale }}</td>
                <td>{{ $sale->responsible }}</td>
                <td>{{ "$ ".number_format($sale->total,0,",",'.') }}</td>
                <td> <a type="button" data-bs-toggle="modal"
                        data-bs-target="#products{{ $sale->id }}">
                        Ver Productos
                    </a>
                </td>
            </tr>

            @include("saleOrder.modals.products")

        @endforeach
        </tbody>
    </table>

@endsection
