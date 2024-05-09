<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCommentRequest $request)
    {
        $comment = $request->validated();
        $comment['user_id'] = Auth::user()->id;
        $comment['blog_id'] = $request->blog_id;

        Comment::create($comment);

        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
