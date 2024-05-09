@php
    $categories = App\Models\Category::all();
@endphp




<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ route('main.home') }}"><img src="{{ asset('asset') }}/img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">


                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item @yield('home-activation')"><a class="nav-link" href="{{ route('main.home') }}">Home</a></li>
                        <li class="nav-item submenu dropdown @yield('categories-activation')">
                            <a href="{{ route('main.category') }}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <li class="nav-item"><a href="{{ route('blog.category', $category->name) }}"
                                        class="nav-link">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item @yield('contact-activation')"><a class="nav-link" href="{{ route('main.contact') }}">Contact</a></li>
                    </ul>

                    @auth
                        <!-- Add new blog -->
                        <a href="{{ route('blog.create') }}" class="btn btn-sm btn-primary mr-3">Add New</a>
                        <!-- End - Add new blog -->
                    @endauth

                    <ul class="nav navbar-nav navbar-right navbar-social">
                        @auth
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">{{ Auth::user()->name }}</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">My Blogs</a></li>
                                    <li class="nav-item">
                                        <form action="{{ route('logout') }}" method="post" id="logout_form">
                                            @csrf
                                            <a class="nav-link"
                                            href="javascript:$('form#logout_form').submit();">Logout</a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <a href="{{ route('register') }}" class="btn btn-sm btn-warning">Register / Login</a>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ Header Menu Area =================-->
