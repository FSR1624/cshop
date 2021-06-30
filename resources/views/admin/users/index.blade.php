@extends('templates.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1 class="float-start">Korisnici</h1>
            <a class="btn btn-sm btn-outline-success float-end" href="{{ route('admin.users.create') }}" role="button">Dodaj</a>
        </div>
    </div>



    <div class="card">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Ime</th>
                <th scope="col">Email</th>
                <th scope="col">Akcija</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user -> id }}</th>
                <td>{{ $user -> name }}</td>
                <td>{{ $user -> email }}</td>
                <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.users.edit', $user->id) }}" role="button">Uredi</a>

                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault();document.getElementById('delete-user-form-{{$user->id}}').submit()">
                        Obriši
                    </button>

                    <form id="delete-user-form-{{$user->id}}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none">
                        @csrf
                        @method("DELETE")
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>

@endsection
