<?php

namespace App\Http\Controllers\post;

use App\Models\post\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//
    }

    public function postComment(Request $request, $postId)
    {
        if(!Auth::check()){
            return redirect()->back()->with('error', 'Please Login Then Comment');
        }
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:comments,email',
            'comment' => 'required',
        ]);

        if($request->reply){
            $request->validate([
                'reply' => 'required|numeric'
            ]);
        }

       $comment = Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'comment' => $request->comment,
            'reply_id' => $request->reply,
            'user_id' => Auth::user()->id,
        ]);

       $postComment = $comment->posts()->sync($postId);
    //    return $postComment;
        return $postComment ? redirect()->back()->with('success', 'Comment Successful') : redirect()->back()->with('error', 'Someting Went Wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}