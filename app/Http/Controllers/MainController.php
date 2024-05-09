<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $blogs = Blog::paginate(4);

        return view('main.pages.index', compact('blogs'));
    }


    public function category(){
        return view('main.pages.category');
    }


    public function contact(){
        return view('main.pages.contact');
    }

    public function store_contact(ContactRequest $request){
        $validated_data = $request->validated();

        Contact::create($validated_data);

        return back()->with('sent', 'The message sent successfully.');
    }
}
