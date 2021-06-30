@extends('templates.main')

@section('content')
    <br>
    <h1>Uredite profil</h1>
    <form method="POST" action="{{ route('user-profile-information.update') }}">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">Ime</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" value="{{ auth()->user()->name }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email adresa</label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" placeholder="Unesite email" value="{{ auth()->user()->email }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Uredi</button>
    </form>
    <br><br>
    <div class="row">
        <div class="col-md-5 col-md-offset-2">
            <h2>Vaše narudžbe</h2>
            @foreach($orders as $order)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($order->cart->items as $item)
                                <li class="list-group-item">
                                    <span class="badge bg-secondary">{{ $item['price'] }} BAM</span>
                                    {{ $item['item']['name'] }} | {{ $item['qty'] }}


                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault();document.getElementById('delete-order-form-{{$order->id}}').submit()">
                                        Obriši
                                    </button>
                                    <form id="delete-order-form-{{$order->id}}" action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display: none">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <strong>Ukupno: {{ $order->cart->totalPrice }}BAM</strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
