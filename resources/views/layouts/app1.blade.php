<!DOCTYPE HTML>
<html>
<head>
    <title>CALEX'OPTIC</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="is-preload">
    @include('partials.header')
    @include('partials.menu')
    <div class="content">
        @yield('content')
    </div>
    @include('partials.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/util.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
</body>
</html>
