<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charSet="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="{{ config('app.name', 'Laravel') }}"/>
    <meta name="keywords" content="{{ config('app.name', 'Laravel') }}"/>

    <!--Facebook Like Button OpenGraph Settings Start-->

    <meta property="og:type" content="website"/>
    @isset($contest)
        <meta property="og:url" content="{{ route('front.application.id', ['contest' => $contest->id]) }}"/>
        @if($contest->img_tip)
            <meta property="og:image" content="{{ asset('storage/' . $contest->img_tip) }}"/>
        @endif
        @if($contest->video_type == 'youtube')
            <meta property="og:image" content="{{ $contest->video_image_id }}"/>
        @endif
        @if($contest->video_type == 'vimeo')
            <meta property="og:image" content="{{ $contest->video_image_id }}"/>
        @endif
        <meta property="og:site_name" content="{{ $contest->title }}"/>
        <meta property="og:title" content="{{ $contest->title }}"/>
        <meta name="dcterms.Title" content="{{ $contest->title }}"/>
        <meta name="dcterms.Subject" content="{{ $contest->title }}"/>
        <meta property="og:description" content="{{ $contest->message }}"/>
    @else
        <meta property="og:url" content="{{ route('front.home') }}"/>
        <meta property="og:image" content="{{ asset('images/kv-men.jpg') }}"/>
        <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}"/>
        <meta property="og:title" content="{{ config('app.name', 'Laravel') }}"/>
        <meta name="dcterms.Title" content="{{ config('app.name', 'Laravel') }}"/>
        <meta name="dcterms.Subject" content="{{ config('app.name', 'Laravel') }}"/>
        <meta property="og:description" content="{{ config('app.name', 'Laravel') }}"/>
    @endisset

    <meta property="og:image:width" content="330"/>
    <meta property="og:image:height" content="330"/>
    <meta property="fb:app_id" content="869984166500416"/>

    {{--    <!--Facebook Like Button OpenGraph Settings End-->--}}

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.typekit.net/rnp1gho.css">

    <link href="{{ asset('css/front.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
</head>

<body class="cbp-spmenu-push{{ isset($include_body_class) ? ' ' . $include_body_class : '' }}">

{{--@include('common.loader')--}}
@include('common.top')

@yield('content')

@include('common.footer')

<!-- Scripts -->
<script src="{{ asset('js/front.js') }}" defer></script>

</body>
</html>
