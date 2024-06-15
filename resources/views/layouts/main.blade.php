<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Tanzainia Geotourism</title>

     <!-- Favicons -->
    <link href="admin/assets/img/favicon.png" rel="icon">
    <link href="admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <link rel='stylesheet' href='{{ asset('assets/css/style.css') }}' type='text/css' />
    <link rel='stylesheet' href='{{ asset('assets/css/jquery.mmenu.css') }}' type='text/css' />
    <link rel='stylesheet' href='{{ asset('assets/css/responsive.css') }}' type='text/css' />
    <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Lato:400,700' type='text/css' />
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.11.2/css/all.css?wpfas=true' type='text/css' />
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.11.2/css/v4-shims.css?wpfas=true' type='text/css' />


    <!-- Vendor CSS Files -->
    <link href="{{ asset('dash/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dash/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('dash/assets/vendor/aos/aos.css" rel="stylesheet') }}">
    <link href="{{ asset('dash/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dash/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{ asset('dash/assets/css/main.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body class="archive post-type-archive post-type-archive-gd_place geodir_custom_posts geodir-page geodir-archive geodir_advance_search gd-map-auto">
    <div id="ds-container">
        @include('partials.header')

        @includeWhen(request()->is('/'), 'partials.map')



        @yield('content')

        @include('partials.footer')
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    @yield('scripts')
</body>

</html>