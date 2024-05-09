@extends('main.base')

@section('tab-title', 'Remake Barber - Login')
@section('hero-title')
    <h1>Register</h1>
@endsection



@section('content')

    {{-- Hero Section --}}
    @include('main.parts.hero')




    <!-- ================ register section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('register') }}" class="" method="post" id="contactForm" novalidate="novalidate">
                        @csrf

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border" name="name" id="name" type="text"
                                    placeholder="Enter your name" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="form-group">
                                    <input class="form-control border" name="email" id="email" type="email"
                                    placeholder="Enter email address" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control border" name="password" id="name" type="password" placeholder="Enter your password">
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="form-group">
                                    <input class="form-control border" name="password_confirmation" type="password" placeholder="Enter your password confirmation">
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-right mt-3">
                            <a href="{{ route('login') }}" class="mx-3">already registered ?</a>
                            <button type="submit" class="button button--active button-contactForm">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
	<!-- ================ register section end ================= -->



@endsection
