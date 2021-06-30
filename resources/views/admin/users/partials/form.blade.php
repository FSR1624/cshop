@csrf
<div class="form-group">
    <label for="name">Ime</label>
    <input name="name" type="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name"
           value="{{ old('name') }} @isset($user) {{ $user->name }}@endisset">
    @error('name')
    <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email adresa</label>
    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" placeholder="Unesite email"
           value="{{ old('email') }} @isset($user) {{ $user->email }}@endisset">
    @error('email')
    <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
    @enderror
</div>
@isset($create)
<div class="form-group">
    <label for="password">Unesite lozinku</label>
    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
    @error('password')
    <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
    @enderror
</div>
<div class="form-group">
    <label for="password_confirmation">Ponovite lozinku</label>
    <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
    @error('password_confirmation')
    <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
    @enderror
</div>
@endisset
<div class="form-group">
    @foreach($roles as $role)
        <div class="form-check">
            <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}"
                   @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
            <label class="form-check-label" for="{{ $role->name }}">
                {{ $role->name }}
            </label>
        </div>
    @endforeach
</div>
<button type="submit" class="btn btn-primary">Potvrdi</button>
