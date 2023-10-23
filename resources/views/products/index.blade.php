@extends("layout.app")

@section("title","Productos")

@section("content")

    @include("layout.messages")

    <div class="container mt-4">
        <form action="{{ route('products.index') }}" method="get" class="mb-4">
            <div class="row justify-content-center">
                <div class="col-sm-3">
                    <select name="typeSearch" id="typeSearch" class="form-select" required>
                        <option selected disabled value="">Seleccionar</option>
                        <option value="name">Nombre</option>
                        <option value="code">Codigo</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <input type="text" name="search" id="search" class="form-control" required>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary" name="browser">Buscar</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped text-center">
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
                    <td>{{ "$ " . number_format($product->price, 0, ",", '.') }}</td>
                    <td>{{ ($product->tax * 100) . "%" }}</td>
                    <td>{{ "$ " . number_format(($product->price * $product->tax), 0, ",", '.') }}</td>
                    <td>{{ "$ " . number_format((($product->price * $product->tax) + $product->price), 0, ",", '.') }}</td>
                    <td>
                        <a type="button" class="btn btn-info" data-bs-toggle="modal"
                           data-bs-target="#products_show{{ $product->id }}">
                            <i class="bi bi-info-circle"></i>
                        </a>
                        <a type="button" class="btn btn-info" data-bs-toggle="modal"
                           data-bs-target="#products_edit{{ $product->id }}">
                            <i class="bi bi-pen"></i>
                        </a>
                        <a type="button" class="btn btn-info" data-bs-toggle="modal"
                           data-bs-target="#products_quantity{{ $product->id }}">
                            <i class="bi bi-patch-plus"></i>
                        </a>
                        <a type="button" class="btn btn-info" data-bs-toggle="modal"
                           data-bs-target="#products_delete{{ $product->id }}">
                            <i class="bi bi-trash"></i>
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

        <div class="row justify-content-center">
            <div class="col-sm-12">
                {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection
