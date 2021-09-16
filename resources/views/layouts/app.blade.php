<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="Virtual Solutions">
        <meta property="og:url" content="https://metadiablo.com" />
        <meta property="og:title" content="The legit Diablo II community - MetaDiablo" />
        <meta property="og:description" content="MetaDiablo is a community made project for Diablo II, and Diablo II: Lord of Destruction that offers tools, guides, forums, a Discord server, and more!" />
        <meta property="og:image" content="{{ asset('img/logo_discord2.png') }}" />
        @if (Route::currentRouteName() === 'profileView' || Route::currentRouteName() === 'password.request' || Route::currentRouteName() === 'login' || Route::currentRouteName() === 'credits' || Route::currentRouteName() === 'privacy'|| Route::currentRouteName() === 'terms')
        <meta name="robots" content="noindex">
        @endif

        @isset($description)
            <meta name="description" content="{{ $description }}">
        @else
            <meta name="description" content="MetaDiablo is a community made project for Diablo II, and Diablo II: Lord of Destruction that offers tools, guides, forums, a Discord server, and more!">
        @endisset
        <title>
            @isset($title)
                {{ $title }} | {{ config('app.name', 'MetaDiablo') }}
            @else
            {{ config('app.name', 'MetaDiablo') }}
            @endisset
        </title>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <script src="https://kit.fontawesome.com/092c9be9ff.js" crossorigin="anonymous"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-152750909-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-152750909-1');
        </script>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <div id="app">
        @include('layouts.nav')
            <!-- alert -->
            <!-- end alert -->
        @if (Route::currentRouteName() == "home")
            <main>
        @else
            <main class="py-4">
        @endif
                @yield('content')
            </main>
        </div>
        <div class="wrapper flex-grow-1"></div>
        @include('layouts.footer')
            
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>