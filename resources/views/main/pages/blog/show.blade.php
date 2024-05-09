@extends('main.base')

@section('tab-title', $blog->name)
@section('hero-title')
    <h1>{{ $blog->name }}</h1>
@endsection


@section('content')

    @include('main.parts.hero')



    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div>
                        @session('updated')
                            <div class="alert alert-success">
                                {{ session('updated') }}
                            </div>
                        @endsession
                    </div>

                    @if (Auth::user()?->id == $blog->user->id)
                        <div class="d-flex flex-row-reverse">
                            <div class="dropdown my-2 fs-4">
                                <a class="" href="#" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('blog.edit', $blog) }}">Edit</a></li>
                                    <li>
                                        <!-- Button trigger modal -->
                                        <a class="dropdown-item bg-danger text-white" data-bs-toggle="modal" data-bs-target="#delete-blog"
                                        href="">
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="main_blog_details">
                        <div class="border">
                            <img class="img-fluid" src="{{ asset('storage/blogs') . '/' . $blog->user_id . '/' . $blog->image }}" alt="">
                        </div>
                        <a href="#"><h4>{{ $blog->name }}</h4></a>
                        <div class="user_details">
                            <div class="float-right mt-sm-0 mt-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>{{ $blog->user->name }}</h5>
                                        <p>{{ $blog->created_at->format('d M, Y H:m') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <img width="42" height="42" src="{{ asset('asset/img/avatar.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>
                            {!! nl2br($blog->description) !!}
                        </p>
                    </div>





                    <div class="comments-area">
                        <h4>{{ count($blog->comments) }} Comments</h4>
                        <div class="comment-list">
                            @foreach ($comments as $comment)
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset('asset/img/avatar.png') }}" width="50px">
                                        </div>
                                        <div class="desc">
                                            <h5><a>{{ $comment->user->name }}</a></h5>
                                            <p class="date">
                                                {{ $comment->created_at->format('F j, Y g:m a') }}
                                                {{-- December 4, 2017 at 3:12 pm --}}
                                            </p>
                                            <p class="comment">
                                                {{ $comment->message }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @auth
                        <div class="comment-form">
                            <h4>Leave a Reply</h4>
                            <form action="{{ route('comment.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <div class="form-group form-inline">
                                    <div class="form-group col-lg-6 col-md-6 name">
                                        <input type="text" class="form-control" name="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group col-lg-6 col-md-6 email">
                                        <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                                    @error('subject')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="message"
                                    placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <input type="submit" value="Post Comment" class="button submit_btn">
                                </div>
                            </form>
                        </div>
                    @else
                        <div>Signin to write a comment.</div>
                    @endauth
                </div>



                <!-- Start Blog Post Siddebar -->
                @include('main.parts.sidebar')
                <!-- End Blog Post Siddebar -->
            </div>

            {{-- Modal --}}
            <div>
                <div class="modal fade" id="delete-blog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Are you sure to delete this blog ?
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('blog.destroy', $blog->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Blog Post Area =================-->

@endsection
