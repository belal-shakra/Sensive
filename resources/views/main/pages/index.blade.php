@extends('main.base')

@section('tab-title', 'Sensive Blog - Home')
@section('home-activation', 'active')

@section('content')


    <main class="site-main">
        <!--================ Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                    <div class="hero-banner__content">
                        <h3>Tours & Travels</h3>
                        <h1>Amazing Places on earth</h1>
                        <h4>December 12, 2018</h4>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Hero Banner end =================-->



        <!--================ Blog slider start =================-->
        <section>
            <div class="container">
                <div class="owl-carousel owl-theme blog-slider">

                    @foreach ($blogs as $blog)
                        <div class="card blog__slide text-center">
                            <div class="blog__slide__img">
                                <img class="img-fluid" src="{{ asset('storage/blogs') }}/{{ $blog->user->id }}/{{ $blog->image }}"
                                alt="{{ $blog->image }}" style="width: 93%;">
                            </div>
                            <div class="blog__slide__content">
                                <a class="blog__slide__label text-truncate" href="{{ route('blog.category', $blog->category->name) }}">{{ $blog->category->name }}</a>
                                <h3><a href="{{ route('blog.show', $blog) }}">{{ $blog->name }}</a></h3>
                                <p>{{ $blog->created_at->format('d M, Y -- H:i') }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!--================ Blog slider end =================-->



        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach ($blogs as $blog)
                            <div class="single-recent-blog-post">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{ asset('storage/blogs') }}/{{ $blog->user->id }}/{{ $blog->image }}" alt="">
                                    <ul class="thumb-info py-0 bg-secondary-subtle
                                    ">
                                    <li><a href="#"><i class="ti-user text-truncate"></i>{{ $blog->user->name }}</a></li>
                                    <li><a href="#"><i class="ti-notepad"></i>{{ $blog->created_at->format('F j, o') }}</a></li>
                                    <li><a href="#"><i class="ti-themify-favicon"></i>{{ count($blog->comments) }} comments</a></li>
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="{{ route('blog.show', $blog) }}">
                                        <h3>
                                            {{ $blog->name }}
                                        </h3>
                                    </a>
                                    <p class="text-truncate">
                                        {{ $blog->description }}
                                    </p>
                                    <a href="{{ route('blog.show', $blog) }}" class="button button--active button-contactForm text-decoration-none">
                                        Read More <i class="ti-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                        {{-- Pagination --}}
                        <div class="row">
                            <div class="col-lg-12">
                                <nav class="blog-pagination justify-content-center d-flex">
                                    {{ $blogs->render('pagination::bootstrap-4') }}
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Start Blog Post Sidebar -->
                    @include('main.parts.sidebar')
                    <!-- End Blog Post Sidebar -->
                </div>
            </div>
        </section>
        <!--================ End Blog Post Area =================-->
    </main>


@endsection
