@extends('templates.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1 class="float-start">Proizvodi</h1>
            <a class="btn btn-sm btn-outline-success float-end" href="{{ route('admin.products.create') }}" role="button">Dodaj</a>
        </div>
    </div>



    <div class="card">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Ime</th>
                <th scope="col">Opis</th>
                <th scope="col">Slika</th>
                <th scope="col">Cijena</th>
                <th scope="col">Akcija</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product -> id }}</th>
                <td>{{ $product -> name }}</td>
                <td>{{ $product -> description }}</td>
                <td>{{ $product -> photo }}</td>
                <td>{{ $product -> price }}</td>
                <td>
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.products.edit', $product->id) }}" role="button">Uredi</a>

                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault();document.getElementById('delete-product-form-{{$product->id}}').submit()">
                        Obriši
                    </button>

                    <form id="delete-product-form-{{$product->id}}" action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: none">
                        @csrf
                        @method("DELETE")
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>

@endsection
