@extends('main.base')

@section('tab-title', 'My Blogs')
@section('hero-title')
    <h1>My Blogs</h1>
@endsection



@section('content')
    @include('main.parts.hero')


    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    @if (count($blogs))
                        @foreach ($blogs as $blog)
                            <div class="card my-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset("storage/blogs/" . Auth::user()->id) . '/' . $blog->image }}"
                                        class="img-fluid rounded-start" alt="{{ $blog->image }}" style="min-height: 10rem;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $blog->name }}</h5>
                                            <p class="card-text text-truncate">{{ $blog->description }}</p>

                                            <div class="d-flex justify-content-between">
                                                <p class="card-text"><small class="text-body-secondary">{{ $blog->created_at->format('d M, Y H:i') }}</small></p>
                                                <a href="{{ route('blog.show', $blog) }}" class="button button--active button-contactForm text-decoration-none">Read</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">
                            You don't write any post yet.<br>
                            <div><a href="{{ route('blog.create') }}" class="text-decoration-none">Try to write</a></div>
                        </div>
                    @endif
                </div>







                <!-- Start Blog Post Siddebar -->
                @include('main.parts.sidebar')
                <!-- End Blog Post Siddebar -->
            </div>
        </div>
    </section>
    <!--================ End Blog Post Area =================-->

@endsection
