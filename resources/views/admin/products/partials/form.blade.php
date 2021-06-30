@csrf
<div class="form-group">
    <label for="name">Ime</label>
    <input name="name" type="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name"
           value="{{ old('name') }} @isset($product) {{ $product->name }}@endisset">
    @error('name')
    <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
    @enderror
</div>

<div class="form-group">
    <label for="description">Opis</label>
    <input name="description" type="name" class="form-control @error('description') is-invalid @enderror" id="description" aria-describedby="description"
           value="{{ old('name') }} @isset($product) {{ $product->description }}@endisset">
    @error('description')
    <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
    @enderror
</div>

<div class="form-group">
    <label for="photo">Slika</label>
    <input name="photo" type="name" class="form-control @error('photo') is-invalid @enderror" id="photo" aria-describedby="photo"
           value="{{ old('photo') }} @isset($product) {{ $product->photo }}@endisset">
    @error('photo')
    <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
    @enderror
    <div class="form-group">
        <label for="price">Cijena</label>
        <input name="price" type="name" class="form-control @error('price') is-invalid @enderror" id="price" aria-describedby="price"
               value="{{ old('price') }} @isset($product) {{ $product->price }}@endisset">
        @error('price')
        <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
        @enderror
</div>
<button type="submit" class="btn btn-primary">Potvrdi</button>
