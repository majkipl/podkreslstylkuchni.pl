@extends('layouts.front')

@section('content')
    <section class="thx thx-container" id="thx">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-lg-8 offset-lg-2 text-center pt-5">
                    <h1 class="text-uppercase pb-5">DZIĘKUJEMY ZA UDZIAŁ W NASZEJ PROMOCJI. TWOJE ZGŁOSZENIE ZOSTAŁO
                        PRZYJĘTE. </h1>
                </div>
                <div class="col-12 col-lg-8 offset-lg-2 text-center py-3">
                    <p class="text-uppercase pb-5">Gratis wyślemy na podany przez Ciebie adres w ciągu 14 dni
                        roboczych. </p>
                </div>
                <div class="col-12 text-center py-0">
                    <img src="{{ asset('images/ekspres.png') }}" alt="img" class="thx-img my-4"/>
                </div>
                <div class="col-12 text-center py-0 pb-5">
                    <a href="{{ route('front.home') }}" class="cta-button mt-5"><span>STRONA GŁÓWNA</span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
