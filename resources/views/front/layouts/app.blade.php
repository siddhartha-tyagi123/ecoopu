<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>eCoopu</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=3.0">
        <link rel="shortcut icon" href="images/fav.png" type="image/x-icon">
        <link href="{{ asset('public/front/css/style.css') }}" rel="stylesheet" media="screen">
        <link href="{{ asset('public/front/css/slick.css') }}" rel="stylesheet" media="screen">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600;700;800;900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="main">
            <!-- header start -->
            @include('front.layouts.header')
            <!--header close-->
            <!-- container start -->
            @yield('content')
            <!--container close-->
            @include('front.layouts.footer')
    </body>
</html>
