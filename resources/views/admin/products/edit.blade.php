@extends('templates.main')

@section('content')
    <h1>Uredi proizvod</h1>
    <div class="card">
    <form method="POST" action="{{ route('admin.products.update', $product->id) }}">
        @method('PATCH')
        @include('admin.products.partials.form')
    </form>
    </div>
@endsection
