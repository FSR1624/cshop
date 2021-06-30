@extends('templates.main')

@section('content')
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img src="{{ $product->photo }}" class="img-responsive">
                    <div class="caption">
                        <h3>{{ $product->name }}</h3>
                        <p class="description">{{ $product->description }}</p>
                        <div class="cearfix">
                            <div class="float-start price">{{ $product->price }} BAM</div>
                            <a href="{{route('addToCart', ['id' => $product->id])}}" class="btn btn-success float-end" role="button">Dodaj u košaricu</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
