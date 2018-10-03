@extends('layouts.front')

@section('content')

    @include('home.sections.baner')
    @include('home.sections.rules')

{{--@if($isEndContest)--}}
{{--    @if($isEndPromotion)--}}
{{--        @if($isEndResult)--}}
{{--            @include('home.sections.take-end-result')--}}
{{--            @include('home.sections.winner-end-result')--}}
{{--        @else--}}
{{--            @include('home.sections.take-end-promotion')--}}
{{--            @include('home.sections.winner-end-promotion')--}}
{{--        @endif--}}
{{--    @else--}}
{{--        @include('home.sections.take-end-contest')--}}
{{--        @include('home.sections.winner-end-contest')--}}
{{--    @endif--}}
{{--@else--}}
{{--    @include('home.sections.take')--}}
{{--@endif--}}

    @include('home.sections.products')
    @include('home.sections.contact')

@endsection
