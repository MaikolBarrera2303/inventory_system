@extends("layout.app")

@section("title","Productos Eliminados")

@section("content")

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">NOMBRE RESPONSABLE</th>
            <th scope="col">DOCUMENTO RESPONSABLE</th>
            <th scope="col">CODIGO PRODUCTO</th>
            <th scope="col">NOMBRE PRODUCTO</th>
            <th scope="col">FECHA ELIMINACION</th>
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
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection
