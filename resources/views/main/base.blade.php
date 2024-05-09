<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tab-title')</title>
    <link rel="icon" href="{{ asset('asset') }}/img/Fevicon.png" type="image/png">

    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('asset') }}/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/vendors/linericon/style.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/vendors/owl-carousel/owl.carousel.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('asset') }}/css/style.css">
</head>
<body>





    {{-- Navbar --}}
    @include('main.parts.nav')

    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('main.parts.footer')








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


    <script src="{{ asset('asset') }}/vendors/jquery/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('asset') }}/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('asset') }}/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ asset('asset') }}/js/jquery.ajaxchimp.min.js/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('asset') }}/js/mail-script.js"></script>
    <script src="{{ asset('asset') }}/js/main.js"></script>
</body>
</html>
