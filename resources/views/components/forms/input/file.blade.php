<div class="field @isset($class){{ $class }}@endisset">
    <div class="file-uploads field-uploads">
        <div class="thumbs hidden">
            <img src="" alt="thumbs" id="{{ $name }}_thumb"/>
        </div>
        <div class="info">
            <img src="{{ $srcIcon }}" alt="cloud" />
            {{ $slot }}{{ $required ? '*' : '' }}
        </div>
        <div class="uploads uploads-d-none">
            <input type="file"
                   name="{{ $name }}"
                   id="{{ $name }}"
                   {{ $required ? 'required' : '' }}
                   class="upload-file file"/>
        </div>
        <button class="button full-width bold button-blue text-uppercase cta-button button-uploads"
                type="button">wgraj plik
        </button>
    </div>
    <div class="error-post error-{{ $name }}">{{ $error }}</div>
</div>
