@extends('templates.main')
@section('content')

    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-1 col-sm-offset-3">
            <h1>Plaćanje: </h1>
            <h4>Ukupno: {{ $total }} BAM</h4>
            <div id="charge_error"  class=" {{ !Session::has('error') ? 'hidden' : ''  }}">
                {{ Session::get('error') }}
            </div>
            <form action="{{ route('checkout') }}" method="POST" id="checkout_form">

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name" >Ime:</label>
                        <input type="text" id="name" class="form-control" required name="name">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="adress" >Adresa:</label>
                        <input type="text" id="adress" class="form-control" required name="adress">
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card_name" >Ime vlasnika kreditne kartice:</label>
                        <input type="textarea" id="card_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-1">
                    <div class="form-group">
                        <label for="card_number" >Broj kreditne kartice:</label>
                        <input type="textarea" id="card_number" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="card_month">Mjesec isteka kartice:</label>
                                <input type="textarea" id="card_month" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="card_year">Godina isteka kartice:</label>
                                <input type="textarea" id="card_year" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card_cvc" >Sigurnosni broj:</label>
                        <input type="textarea" id="card_cvc" class="form-control" required>
                    </div>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-success">Naruči</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::to('checkout.js') }}"></script>
@endsection
