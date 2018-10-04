@extends('layouts.front')

@section('content')
    <section class="form" id="form">
        <div class="container">

            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <form id="save" method="POST" action="{{ route('front.application.save') }}">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-xl-10 offset-xl-1 o text-right min-padding">
                                <h1 class="text-uppercase">formularz zgłoszeniowy</h1>
                            </div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                                @component('components.forms.input.text', [
                                    'name' => 'firstname',
                                    'value' => '',
                                    'placeholder' => 'Imię',
                                    'required' => true,
                                    'max' => 128,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5">
                                @component('components.forms.input.text', [
                                    'name' => 'lastname',
                                    'value' => '',
                                    'placeholder' => 'Nazwisko',
                                    'required' => true,
                                    'max' => 128,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                                @component('components.forms.input.email', [
                                    'name' => 'email',
                                    'value' => '',
                                    'placeholder' => 'E-mail',
                                    'required' => true,
                                    'max' => 255,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5">
                                @component('components.forms.input.text', [
                                    'name' => 'phone',
                                    'value' => '',
                                    'placeholder' => 'Telefon',
                                    'required' => true,
                                    'max' => 32,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                                @component('components.forms.input.text', [
                                    'name' => 'address',
                                    'value' => '',
                                    'placeholder' => 'Ulica',
                                    'required' => true,
                                    'max' => 128,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5">
                                <div class="field">
                                    @component('components.forms.input.text', [
                                        'name' => 'address_nb',
                                        'value' => '',
                                        'placeholder' => 'Numer mieszkania',
                                        'required' => true,
                                        'max' => 16,
                                        'error' => ''])
                                    @endcomponent
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                                @component('components.forms.input.text', [
                                    'name' => 'zip',
                                    'value' => '',
                                    'placeholder' => 'Kod pocztowy',
                                    'required' => true,
                                    'max' => 6,
                                    'error' => ''])
                                @endcomponent
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5">
                                @component('components.forms.input.text', [
                                    'name' => 'city',
                                    'value' => '',
                                    'placeholder' => 'Miasto',
                                    'required' => true,
                                    'max' => 64,
                                    'error' => ''
                                ])
                                @endcomponent
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row fieldset py-3 pt-5">
                            @component('components.forms.input.file', [
                                'name' => 'img_receipt',
                                'required' => true,
                                'error' => '',
                                'class' => 'mx-auto',
                                'srcIcon' => asset('/images/form-1.jpg')
                            ])
                                Dodaj zdjęcie <br>dowodu zakupu <br/>(paragonu lub faktury)
                            @endcomponent
                        </div>

                        <div class="row fieldset py-3">
                            @component('components.forms.input.file', [
                                'name' => 'img_ean',
                                'required' => true,
                                'error' => '',
                                'class' => 'mx-auto',
                                'srcIcon' => asset('/images/form-2.jpg')
                            ])
                                Dodaj zdjęcie wyciętego <br/>kodu kreskowego EAN <br/>(znajdziesz go na <br/>pudełku po
                                produkcie)
                            @endcomponent
                        </div>

                        <div class="row fieldset py-3 pb-5">
                            @component('components.forms.input.file', [
                                'name' => 'img_box',
                                'required' => true,
                                'error' => '',
                                'class' => 'mx-auto',
                                'srcIcon' => asset('/images/form-3.jpg')
                            ])
                                Dodaj zdjęcie pudełka z <br/>wyciętym kodem <br/>kreskowym EAN
                            @endcomponent
                        </div>

                        <div class="row fieldset">
                            <div class="col-12 col-xl-10 offset-xl-1">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_1',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Oświadczam, że zapoznałam/em się i akceptuję Regulamin Promocji „Buy&Get”.
                                @endcomponent
                            </div>
                            <div class="col-12 col-xl-10 offset-xl-1">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_2',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Zapoznałam/em się z Polityką Prywatności.
                                @endcomponent
                            </div>
                            <div class="col-12 col-xl-10 offset-xl-1">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_3',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Wyrażam zgodę na przetwarzanie moich danych osobowych w celu realizacji obowiązków
                                    wynikających z organizacji i przeprowadzenia promocji „Buy&Get” przez Highlite
                                    Bielecka, Jellinek Spółka Jawna z siedzibą we Wrocławiu, przy ul. Pomorskiej 55/2.
                                @endcomponent
                            </div>
                            <div class="col-12 col-xl-10 offset-xl-1">
                                @component('components.forms.input.checkbox', [
                                    'name' => 'legal_4',
                                    'required' => true,
                                    'error' => ''
                                ])
                                    Wyrażam zgodę na przetwarzanie moich danych osobowych: imienia, nazwiska, adresu
                                    e-mail, numeru telefonu w celach marketingowych przez Spectrum Brands Polska Sp. z
                                    o.o. z siedzibą w Warszawie, przy ul. Bitwy Warszawskiej 1920 r. 7a.
                                @endcomponent
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row fieldset">
                            <div class="col-12 text-center py-5">
                                <a href="#" class="cta-button submit">
                                    <span>WYŚLIJ ZGŁOSZENIE</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
