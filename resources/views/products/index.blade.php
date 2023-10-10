@extends("layout.app")

@section("title","Productos")

@section("content")

    @include("layout.messages")

    <form action="{{ route("products.index") }}" method="get" style="margin: 20px">
        <select name="typeSearch" id="typeSearch" required>
            <option selected disabled value="">Seleccionar</option>
            <option value="name">Nombre</option>
            <option value="code">Codigo</option>
        </select>
        <input type="text" name="search" id="search" required>
        <button type="submit" name="browser">Buscar</button>
    </form>


    <table class="table text-center">
        <thead>
        <tr>
            <th scope="col">CODIGO</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col"></th>
            <th scope="col">PRECIO SIN IVA</th>
            <th scope="col">IVA</th>
            <th scope="col">VALOR DE IVA</th>
            <th scope="col">PRECIO CON IVA</th>
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
                <td>{{ ($product->tax*100)."%" }}</td>
                <td>{{ "$ ".number_format(($product->price*$product->tax),0,",",'.') }}</td>
                <td>{{ "$ ".number_format((($product->price*$product->tax)+$product->price),0,",",'.') }}</td>
                <td>
                    <a type="button" class="link-underline-info" data-bs-toggle="modal"
                       data-bs-target="#products_show{{ $product->id }}">
                        Informacion
                    </a>
                    <a type="button" class="link-underline-info" data-bs-toggle="modal"
                       data-bs-target="#products_edit{{ $product->id }}">
                        Editar
                    </a>
                    <a type="button" class="link-underline-info" data-bs-toggle="modal"
                            data-bs-target="#products_quantity{{ $product->id }}">
                        Agregar cantidad
                    </a>
                    <a type="button" class="link-underline-info" data-bs-toggle="modal"
                       data-bs-target="#products_delete{{ $product->id }}">
                        Eliminar producto
                    </a>
                </td>
            </tr>

            @include("products.modals.quantity")
            @include("products.modals.show")
            @include("products.modals.edit")
            @include("products.modals.delete")

        @endforeach
        </tbody>
    </table>

    {{ $products->links() }}

@endsection
