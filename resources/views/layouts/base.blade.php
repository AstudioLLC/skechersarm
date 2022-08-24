<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="icon" href="{{asset('images/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('frontend/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('frontend/css/drawerr.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <meta name="description" content="{{$seoDescription}}">
    <meta name="keywords" content="{{$seoKeywords}}">
    <title>Skechers Armenia {{$seoTitle}}</title>
{{--    <title>Skechers {{ $currentPage ? '- ' . $currentPage->title : '' }}</title>--}}
    @livewireStyles

</head>
<body>

<livewire:frontend.includes.header-component />

@yield('content')

<livewire:frontend.includes.footer-component :pagesForInformation="$pagesForInformation" :pagesForBuyers="$pagesForBuyers" :information="$information" :headerPages="$headerPages" />

@livewireScripts

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="{{asset('frontend/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/drawerr.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="{{asset('frontend/js/test.js')}}"></script>
<script src="{{asset('frontend/js/lightbox.js')}}"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />

</body>
</html>
