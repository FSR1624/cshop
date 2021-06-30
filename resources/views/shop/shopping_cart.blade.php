@extends('templates.main')

@section('content')

    @if(Session::has('cart'))

        <div class="row">
            <div class="col-sm-5 col-md-5 ">
                Proizvodi:
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item list-group-item-dark"><strong>{{$product['item']['name']}} </strong>
                            <span class="badge rounded-pill bg-dark"> {{ $product['price'] }} </span>
                            <span class="badge rounded-pill bg-dark">{{$product['qty']}}</span>

                            <div class="dropdown float-end">
                                <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Akcija
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{route('reduceByOne', ['id' => $product['item']['id']])}}">Uklonite jedan proizvod</a></li>
                                    <li><a class="dropdown-item" href="{{route('removeItem', ['id' => $product['item']['id']])}}">Ukloni sve proizvode</a></li>
                                </ul>
                            </div></li>

                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Ukupno: {{$totalPrice}}</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">Naruči</a>
            </div>
        </div>

    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>Košarica je prazna</h2>
            </div>
        </div>
    @endif
@endsection
