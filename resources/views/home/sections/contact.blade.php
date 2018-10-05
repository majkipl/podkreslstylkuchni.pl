<section class="contact py-4" id="contact">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 my-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000">
                <img src="{{ asset('images/toster-compressor.png') }}" alt="toster"/>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-12 my-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000">
                <h2>FORMULARZ KONTAKTOWY</h2>
                <h3>Masz pytanie? Napisz do nas!</h3>
            </div>
        </div>
        <div class="row form text-center" id="formContact">
            <form class="form row" method="post" action="{{ route('front.contact.send') }}">
                <div class="col-12 col-sm-6 col-md-4 offset-md-2 col-xl-3 offset-xl-3 my-3" data-aos="fade-up"
                     data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
                    @component('components.forms.input.text', [
                        'name' => 'name',
                        'value' => '',
                        'placeholder' => 'Imię i nazwisko',
                        'required' => true,
                        'max' => 128,
                        'error' => ''
                    ])
                    @endcomponent
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 my-3" data-aos="fade-up"
                     data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
                    @component('components.forms.input.email', [
                            'name' => 'email',
                            'value' => '',
                            'placeholder' => 'E-mail',
                            'required' => true,
                            'max' => 255,
                            'error' => ''
                    ])
                    @endcomponent
                </div>
                <div class="col-12 col-md-8 offset-md-2 col-xl-6 offset-xl-3 my-3" data-aos="fade-up"
                     data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
                    @component('components.forms.textarea', [
                        'name' => 'message',
                        'value' => '',
                        'placeholder' => 'Wiadomość',
                        'required' => true,
                        'max' => 4096,
                        'error' => ''
                    ])
                    @endcomponent
                </div>
                <div class="col-12 col-md-8 offset-md-2 col-xl-6 offset-xl-3 my-3" data-aos="fade-up"
                     data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
                    @component('components.forms.input.checkbox', [
                        'name' => 'legal_5',
                        'required' => true,
                        'error' => ''
                    ])
                        Wyrażam zgodę na przetwarzanie przekazanych przeze mnie danych osobowych (imienia, nazwiska i
                        adresu e-mail) w celu utrzymywania kontaktu przez Spectrum Brands Poland sp. z o.o. z siedzibą w
                        Warszawie, przy ul. Bitwy Warszawskiej 1920 r. 7A, jako administratora przekazanych danych
                        osobowych. Potwierdzam jednocześnie, że zostałem poinformowany o dobrowolności wyrażenia zgody
                        na przetwarzanie danych osobowych, o prawie do wycofania zgody w dowolnym momencie oraz o
                        zgodności z prawem przetwarzania, którego dokonano na podstawie zgody przed jej wycofaniem.
                        Więcej informacji o przetwarzaniu danych osobowych pod linkiem Polityka prywatności.
                    @endcomponent
                </div>
                <div class="col-12 col-md-8 offset-md-2 col-xl-6 offset-xl-3 mb-3 text-right" data-aos="fade-up"
                     data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
                    <a href="#" class="send cta-button">wyślij</a>
                </div>
            </form>
        </div>
        <div class="row text-center">
            <div class="col-12 my-4">
                <h4></h4>
            </div>
        </div>
    </div>
</section>
