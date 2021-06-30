<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{config('Clothes Shop', 'Clothes Shop')}}</title>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script !src="{{asset('js/app.js')}}" defer></script>

    </head>
    <body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <div>
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('Clothes Shop', 'Clothes Shop') }}</a>
                <a class=navbar-link" href="{{ url('/about_us') }}"> O nama </a>
                <a href="https://docs.google.com/document/d/1UG00ZlapVKi5bUmrAlcbLy_IDXptYfiv/edit" target="_blank"> Vizija </a>
            </div>

            <div class="form-inline my-2 my-lg-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @can('is-user')
                        <a href="{{route('shoppingCart')}}">
                            <i class="fas fa-shopping-cart"></i>
                            Košarica
                            <span class="badge bg-dark">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                        </a>
                    @endcan
                    @auth
                        <a href="{{route('user.profile')}}">Korisnik</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">Odjavi se</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Prijava</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registracija</a>
                        @endif
                    @endauth
                </div>
            </div>
            @endif
        </div>
    </nav>
    @can('is-admin')
    <nav class="sub-nav navbar navbar-expand-lg">
            <div class="container form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    @can('is-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index') }}">Korisnici</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products.index') }}">Proizvodi</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.orders.index') }}">Narudžbe</a>
                        </li>
                        @endcan
                </ul>
            </div>
    </nav>
@endcan
        <main class="container">
            @include('partials.alerts')
            @yield('content')
        </main>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    @yield('scripts')
    </body>
</html>
