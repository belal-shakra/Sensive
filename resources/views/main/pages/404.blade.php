    <link rel="stylesheet" href="{{ asset('asset') }}/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/style.css">
    <link rel="icon" href="{{ asset('asset') }}/img/Fevicon.png" type="image/png">
    <title>Page Not Found</title>


    <div class="mb-5">
        <div class="d-flex justify-content-center align-items-center">
            <h1 style="font-size: 22rem;"
            >404</h1>
        </div>
        <h1 class="d-flex justify-content-center align-items-center mb-2">Page Not Found</h1>

        <div class="my-2 d-flex justify-content-center align-items-center">
            <a href="{{ route('main.home') }}" class="btn btn-dark">Go To Home</a>
        </div>
    </div>


    @include('main.parts.footer')
