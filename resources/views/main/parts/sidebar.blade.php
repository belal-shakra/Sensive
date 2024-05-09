@php
    $categories = App\Models\Category::all();
    $blogs = App\Models\Blog::latest()->take(3)->get();
@endphp



<div class="col-lg-4 sidebar-widgets d-md-none d-lg-block">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>

            @session('stats')
                <div class="alert alert-success">
                    {{ session('stats') }}
                </div>
            @endsession

            <form action="{{ route('subscribe') }}" method="post">
                @csrf

                <div class="form-group mt-30">
                    <div class="col-autos">
                        <input type="email" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Enter email'" name="email">
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <input type="submit" value="Subcribe" class="bbtns d-block mt-20 w-100">
            </form>
        </div>

        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Catgory</h4>
            <ul class="cat-list mt-20">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('blog.category', $category->name) }}" class="d-flex justify-content-between">
                            <p>{{ $category->name }}</p>
                            <p>({{ count($category->blogs) }})</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Post</h4>
            <div class="popular-post-list">
                @foreach ($blogs as $blog)
                    <div class="single-post-list">
                        <div class="thumb">
                            <img class="card-img rounded-0" src="{{ asset('storage/blogs') }}/{{ $blog->user->id }}/{{ $blog->image }}" alt="">
                            <ul class="thumb-info">
                                <li><a href="#">{{ $blog->user->name }}</a></li>
                                <li><a href="#">{{ $blog->created_at->format('M j') }}</a></li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
