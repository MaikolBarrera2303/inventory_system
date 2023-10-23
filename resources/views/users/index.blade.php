@extends("layout.app")

@section("title","Usuarios")

@section("content")

    @include("layout.messages")

    <div class="container mt-4">

        <table class="table table-bordered table-striped text-center">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">CORREO</th>
                <th scope="col">DOCUMENTO</th>
                <th scope="col">ROL</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->document }}</td>
                    <td>{{ $user->roles->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="row justify-content-center">
            <div class="col-sm-12">
                {{ $users->links() }}
            </div>
        </div>
    </div>

@endsection
