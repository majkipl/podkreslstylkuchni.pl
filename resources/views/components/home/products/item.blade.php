<div class="item p-3 py-5" id="{{ $id }}">
    <div class="text text-center">
        <img src="{{ asset('images/produkty/' . $productId . '.jpg') }}"
             alt="{{ $productTitle }}" width="190" height="200"/>
        <p class="text-center name"><strong>{{ $productTitle }}</strong><br/>{{ $productId }}</p>
        <a href="#" class="cta-button popup-open" data-popup="{{ $productId }}">KUP</a>
    </div>
</div>
