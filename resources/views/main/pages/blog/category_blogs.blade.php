@extends('main.base')

@section('tab-title', 'Blogs | ' . $category_name)
@section('hero-title')
    <h1>{{ $category_name }}</h1>
@endsection


@section('content')

    @include('main.parts.hero')



        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">

                            @if (count($blogs))
                                @foreach ($blogs as $blog)
                                    <div class="col-md-6">
                                        <div class="single-recent-blog-post card-view">
                                            <div class="thumb">
                                                <img class="card-img rounded-0" src="{{ asset('storage/blogs') }}/{{ $blog->user->id }}/{{ $blog->image }}" alt="">
                                                <ul class="thumb-info">
                                                    <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                                    <li class=""><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                                </ul>
                                            </div>

                                            <div class="details mt-20">
                                                <a href="blog-single.html">
                                                    <h3>{{ $blog->name }}</h3>
                                                </a>
                                                <p class="text-truncate">{{ $blog->description }}</p>
                                                <a class="button" href="{{ route('blog.show', $blog->id) }}">Read More <i class="ti-arrow-right"></i></a>
                                            </div>
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

                            @else
                                <div class="text-center">There is no blogs that belongs to this category yet.</div>
                            @endif
                        </div>
                    </div>

                    <!-- Start Blog Post Siddebar -->
                    @include('main.parts.sidebar')
                    <!-- End Blog Post Siddebar -->
                </div>
            </div>
        </section>
        <!--================ End Blog Post Area =================-->


@endsection
