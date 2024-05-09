@extends('main.base')

@section('tab-title', 'Create New Blog')
@section('hero-title')
    <h1>Create New Blog</h1>
@endsection



@section('content')

    {{-- Hero Section --}}
    @include('main.parts.hero')




    <!-- ================ register section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">

                @session('posted')
                    <div class="alert alert-success">
                        {{ session('posted') }}
                    </div>
                @endsession

                <div class="col-12 shadow-lg border py-2 rounded">
                    <form action="{{ route('blog.store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf

                        {{-- Blog Title --}}
                        <div>
                            <div class="form-group">
                                <input type="text" class="form-control border" name="name" id="name"
                                placeholder="Blog Title" value="{{ old('name')}}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        {{-- Blog Images --}}
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 mb-3">
                                <div class="input-group">
                                    <label class="input-group-text" for="img">Upload Image</label>
                                    <input type="file" class="form-control" id="img" name="image" value="{{ old('name')}}">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-sm-12 col-lg-6 mb-3">
                                <div class="input-group">
                                    <select class="form-select" id="category" name="category_id">
                                        <option selected value="">Select Blog category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        {{-- Blog Post --}}
                        <div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="" id="post" name="description"
                                style="height: 14rem">{{ old('description') }}</textarea>
                                <label for="post">Post</label>
                            </div>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- Submit --}}
                        <div class="form-group text-cente text-right mt-3">
                            <input type="submit" value="Post" class="button button--active button-contactForm">
                        </div>
                    </form>
                </div>
            </div>
        </div>





    </section>
	<!-- ================ register section end ================= -->



@endsection
