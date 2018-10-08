<section class="products pt-4" id="products">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 my-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000">
                <h2>PRODUKTY</h2>
            </div>
        </div>
    </div>
    <div class="container container-sliders">
        <div class="row row-eq-height text-center">
            <div class="col-12 col-md-6 text-center retro" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000">
                <div class="row row-eq-height">
                    <div class="col-2 col-sm-1">
                        <a href="#" class="owl-carousel-prev">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                        </a>
                    </div>
                    <div class="col-8 col-sm-10">
                        <h3 class="pt-4">RETRO</h3>
                        <div class="owl-carousel owl-theme">
                            @foreach($products as $product)
                                @if($product->type == 'retro')
                                    @component('components.home.products.item', [
                                        'id' => 'item-' . $loop->index,
                                        'productTitle' => $product->name,
                                        'productId' => $product->code,
                                    ])
                                    @endcomponent
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-2 col-sm-1">
                        <a href="#" class="owl-carousel-next">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 text-center modern" data-aos="fade-up" data-aos-anchor-placement="center-bottom"
                 data-aos-duration="1000" data-aos-delay="300">
                <div class="row row-eq-height">
                    <div class="col-2 col-sm-1">
                        <a href="#" class="owl-carousel-prev">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
                        </a>
                    </div>
                    <div class="col-8 col-sm-10">
                        <h3 class="pt-4">NOWOCZESNE</h3>
                        <div class="owl-carousel owl-theme">
                            @foreach($products as $product)
                                @if($product->type == 'inspire')
                                    @component('components.home.products.item', [
                                        'id' => 'item-' . $loop->index,
                                        'productTitle' => $product->name,
                                        'productId' => $product->code,
                                    ])
                                    @endcomponent
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-2 col-sm-1">
                        <a href="#" class="owl-carousel-next">
                            <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@foreach($products as $product)
    @include('popup.shop', ['id' => $product->code])
@endforeach
