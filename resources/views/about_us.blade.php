@extends('templates.main')

@section('content')
    <br>
    <h3>Tehnologije koje smo koristili:</h3>
    <p class="lead">HTML<br>CSS<br>JavaScript<br>Bootstrap<br>MySQL<br>Laravel</p>
    <h3><a href="https://drive.google.com/file/d/1UG00ZlapVKi5bUmrAlcbLy_IDXptYfiv/view">Vizija</a></h3>
    <h3>O nama</h3>
    <ul class="list-unstyled">
        <li class="media">
            <img src="{{ asset('images/ma.png') }}" class="img-responsive img-rounded"
                 style="max-height: 200px; max-width: 250px;" alt="Marija Agatić">
            <div class="media-body">
                <h5 class="mt-0 mb-1">Marija Agatić</h5>
                Rođena sam 21.9.1998. godine u Novoj Biloj. Odrasla sam u Busovači gdje sam pohađala Srednju školu Busovača, smjer Opća gimnazija. Trenutno sam 3. godina preddiplomskog studija računarstva na FSRE-u u Mostaru.
            </div>
        </li>
        <li class="media">
            <img src="{{ asset('images/dd.png') }}" class="img-responsive img-rounded"
                 style="max-height: 250px; max-width: 200px;" alt="Dragan Drljepan">
            <div class="media-body">
                <h5 class="mt-0 mb-1">  Dragan Drljepan</h5>
                Rođen sam 23.5.1999. u Kiseljaku gdje i trenutno živim, srednju školu sam završio 2017. u Kreševu, smjer Tehničar za Računarstvo. Nakon toga sam upisao fakultet i trenutno sam treća godina računarstva na FSRE-u u Mostaru.
            </div>
        </li>
    </ul>
@endsection
