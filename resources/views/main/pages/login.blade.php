@extends('main.base')

@section('tab-title', 'Remake Barber - Login')
@section('hero-title')
    <h1>Login</h1>
@endsection

@section('content')

    {{-- Hero Section --}}
    @include('main.parts.hero')




    <!-- ================ login section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <form action="{{ route('login') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <input class="form-control border" name="email" id="email" type="email" placeholder="Enter email address"
                            value="{{ old('email') }}"
                            >
                            @error('email')
                                <span class="text-danger mx-2">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <input class="form-control border" name="password" id="name" type="password" placeholder="Enter your password">
                            @error('password')
                                <span class="text-danger mx-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group text-right mt-3">
                            <a href="{{ route('register') }}" class="mx-3">new user ?</a>
                            <button type="submit" class="button button--active ">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
	<!-- ================ login section end ================= -->

@endsection
