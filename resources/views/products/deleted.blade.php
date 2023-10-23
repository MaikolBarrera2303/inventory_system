@extends("layout.app")

@section("title","Productos Eliminados")

@section("content")
    <div class="container mt-4">

        <table class="table table-bordered table-striped text-center">
            <thead>
            <tr>
                <th scope="col">NOMBRE RESPONSABLE</th>
                <th scope="col">DOCUMENTO RESPONSABLE</th>
                <th scope="col">CODIGO PRODUCTO</th>
                <th scope="col">NOMBRE PRODUCTO</th>
                <th scope="col">FECHA ELIMINACION</th>
                <th scope="col">OPCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name_responsible }}</td>
                    <td>{{ $product->document_responsible }}</td>
                    <td>{{ $product->code_product }}</td>
                    <td>{{ $product->name_product }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <a href="{{ route("products.restore",$product->code_product) }}">
                            Restablecer Producto
                        </a>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

        <div class="row justify-content-center">
            <div class="col-sm-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection
