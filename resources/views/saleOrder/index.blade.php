@extends("layout.app")

@section("title","Ultimas ventas")

@section("content")

    <div class="container mt-4">

        <table class="table table-bordered table-striped text-center">
            <thead>
            <tr>
                <th scope="col">FECHA</th>
                <th scope="col">No FACTURA</th>
                <th scope="col">RESPONSABLE</th>
                <th scope="col">TOTAL</th>
                <th scope="col">PRODUCTOS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>
                        {{ strftime('%d de %B de %Y', strtotime($sale->date_sale))  }}
                    </td>
                    <td>{{ $sale->number_facture }}</td>
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

        <div class="row justify-content-center">
            <div class="col-sm-12">
                {{ $sales->links() }}
            </div>
        </div>
    </div>

@endsection
