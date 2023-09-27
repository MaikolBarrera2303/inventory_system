@extends("layout.app")

@section("title","Productos")

@section("content")

    @if(session("success"))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
    @endif

    @if(session("error"))
        <div class="alert alert-danger" role="alert">
            {{ session("error") }}
        </div>
    @endif

    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">CODIGO</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col"></th>
            <th scope="col">PRECIO</th>
            <th scope="col">OPCIONES</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->code }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    @if($product->quantity <= 15)
                        <i class="bi bi-exclamation-triangle-fill" style="color: #ff0000"></i>
                    @endif
                </td>
                <td>{{ "$ ".number_format($product->price,0,",",'.') }}</td>
                <td>
                    <a href="{{ route("products.show",$product->id) }}">Informacion</a>
                    <a href="{{ route("products.edit",$product->id) }}">editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $products->links() }}

@endsection
