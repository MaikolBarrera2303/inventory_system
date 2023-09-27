@extends("layout.app")

@section("title","Usuarios")

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

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">CORREO</th>
            <th scope="col">DOCUMENTO</th>
            <th scope="col">ROL</th>
            <th scope="col">OPCIONES</th>
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
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}

@endsection
