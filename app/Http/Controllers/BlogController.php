<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function __construct(){
        $this->middleware('my.blog', ['only' => ['edit', 'update']]);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::where('user_id', Auth::user()->id)->get();
        return view('main.pages.blog.all_blogs', compact('blogs'));
    }


    /**
     * Show blogs that belongs to requested category.
     */
    public function category_blogs(string $category_name, Request $request){

        $cates = Category::where('name', $category_name)->get();
        foreach($cates as $cate){
            $id = $cate->id;
        }

        $blogs = Blog::where('category_id', $id)->paginate(8);
        return view('main.pages.blog.category_blogs', compact(['blogs', 'category_name']));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('main.pages.blog.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $blog_details = $request->validated();
        $blog_details['user_id'] = Auth::user()->id;



        $blog_details['image'] = $this->image_handling($request);
        Blog::create($blog_details);

        $cate = Category::find($blog_details['category_id']);
        $cate->blogs_number++;
        $cate->save();

        return back()->with('posted', 'The blog posted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $comments = Comment::where('blog_id', $blog->id)->get();
        return view('main.pages.blog.show', compact(['blog', 'comments']));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('main.pages.blog.edit', compact(['blog', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {

        if(Auth::user()->id == $blog->user->id){
            $blog_details = $request->validated();

            if($request->hasFile('image')){
                $blog_details['image'] = $this->image_handling($request);
                Storage::delete("public/blogs/$blog->image");
            }

            $rec = Blog::find($blog->id);
            $rec->update($blog_details);
            return redirect("/blog/$blog->id")->with('updated', 'The Blog Updated Succefully.');
        }

        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if(Auth::user()->id == $blog->user->id){
            Storage::delete("public/blogs/$blog->image");
            $blog->delete();
            return to_route('blog.index');
        }

        abort(403);
    }







    private function image_handling(Request $request) : string
    {
        /*
        IMAGE Handling:
        ------------------
        -- get image.
        -- change its currentt name.
        -- move image to my project.
        -- save new name in database record.
        */

        // dd($request->image);
        // dump($image);


        // get image.
        $image = $request->image;

        // change its currentt name.
        $new_image_name = time() .'_'. $image->getClientOriginalName();

        // move image to my project.
        $image->storeAs("blogs/". Auth::user()->id, $new_image_name, 'public');

        return $new_image_name;
    }
}
