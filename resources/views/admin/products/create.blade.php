@extends('templates.main')

@section('content')
    <h1>Dodaj proizvod</h1>
    <div class="card">
    <form method="POST" action="{{ route('admin.products.store') }}">
        @include('admin.products.partials.form', ['create' => true])
    </form>
    </div>
@endsection
