@extends('templates.main')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1 class="float-start">Narudžbe</h1>
        </div>
    </div>



    <div class="card">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Korisnikov ID</th>
                <th scope="col">Kartica</th>
                <th scope="col">Adresa</th>
                <th scope="col">Korisničko ime</th>
                <th scope="col">Payment ID</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <th scope="row">{{ $order -> id }}</th>
                <td>{{ $order -> user_id }}</td>
                <td>@foreach($order->cart->items as $item)
                        Proizvod: {{ $item['item']['name'] }}<br>
                        Količina{{ $item['qty'] }}<br>
                        Cijena: {{ $item['price'] }} BAM

                        </li>
                    @endforeach</td>
                <td>{{ $order -> adress }}</td>
                <td>{{ $order -> name }}</td>
                <td>{{ $order -> payment_id }}</td>

                <td>

                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault();document.getElementById('delete-order-form-{{$order->id}}').submit()">
                        Obriši
                    </button>

                    <form id="delete-order-form-{{$order->id}}" action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display: none">
                        @csrf
                        @method("DELETE")
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
