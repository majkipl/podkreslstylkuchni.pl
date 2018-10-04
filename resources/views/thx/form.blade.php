@extends('layouts.front')

@section('content')
    <section class="thx" id="thx">
        <div class="container">
            <div class="row py-5">
                <div class="col-12 col-lg-6 offset-lg-3 text-center thx-container pt-5">
                    <h1 class="text-uppercase pb-5">Dziękujemy za wypełnienie <br/>formularza zgłoszeniowego</h1>

                    <p class="text-uppercase">na twój adres mailowy została wysłana wiadomość.
                        Prosimy o potwierdzenie zgłoszenia klikając w znajdujący się w wiadomośći link.</p>

                    <img src="{{ asset('images/toster-big.png') }}" alt="img" class="thx-img my-5"/>
                </div>

                <div class="col-12 col-lg-6 offset-lg-3 text-center pb-5">
                    <a href="{{ route('front.home') }}" class="cta-button mt-5"><span>STRONA GŁÓWNA</span></a>
                </div>
            </div>
        </div>
    </section>
@endsection
