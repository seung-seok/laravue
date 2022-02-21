<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravue - 도매꾹 인기 100</title>
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
        <link rel="stylesheet" href="{{ asset('css/item.css') }}">
        <link rel="stylesheet" href="{{ asset('css/swiper.css')}}">
        <link rel="stylesheet" href="{{ asset('css/default.css') }}">
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <!-- jQuery -->
        <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
    </head>
    <body>
        <!-- <div id="nav"></div> -->
        <div id="main"></div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 'auto',
            freeMode: true,
        });
    </script>
</html>
