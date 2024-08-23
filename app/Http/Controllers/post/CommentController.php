<?php

namespace App\Http\Controllers\post;

use App\Models\post\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

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
        $request->validate([
            'name' => 'required|string',
            'comment' => 'required',
        ]);

        if ($request->reply) {
            $request->validate([
                'reply' => 'required|numeric'
            ]);
        }

        $comment = Comment::create([
            'name' => $request->name,
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
        $data = Comment::find($id);
        if (Gate::authorize('checkPermission', $data->user_id)) {
            return view('commentEdit', compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'comment' => 'required',
        ]);
        $updateComment = Comment::where('id', $id)->update([
            'name' => $request->name,
            'website' => $request->website,
            'comment' => $request->comment,
        ]);

        //    return $postComment;
        return $updateComment ? redirect()->back()->with('success', 'Comment Update Successful') : redirect()->back()->with('error', 'Someting Went Wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteComment = Comment::find($id);
        if (Gate::authorize('checkPermission', $deleteComment->user_id)) {
            $commentDelete = Comment::where('id', $id)->update(['status' => 'delete']);
            return $commentDelete ? redirect()->back()->with('success', 'Comment Delete Successful') : redirect()->back()->with('success', 'Someting went wrong');
        }
    }

    // Comment Reaction Post Method
    public function reaction(Request $request, $action)
    {
        $request->validate([
            'commentId' => 'required|integer'
        ]);
        Validator::make(['action' => $action], [
            'action' => 'required|string',
        ]);

        $commentId = $request->commentId;
        $commentReaction = session()->get('commentReaction', []);

        if ($action === 'like') {
            if (!in_array($commentId, $commentReaction)) {
                $like = Comment::where('id', $commentId);
                $like->increment('comment_like');

                $commentReaction[] = $commentId;
                session()->put('commentReaction', $commentReaction);
                $like = true;
            } else {
                $like = false;
            }
            return $like ? redirect()->back()->with('success', 'Comment Like Success') : redirect()->back()->with('error', 'Already Like The Comment');
        }
        if ($action === 'dislike') {
            if (in_array($commentId, $commentReaction)) {
                $like = Comment::where('id', $commentId);
                $like->decrement('comment_like');

                $commentReaction = array_filter($commentReaction, function ($value) use ($commentId) {
                    return $value !== $commentId;
                });
                $commentReaction = array_values($commentReaction);
                session()->put('commentReaction', $commentReaction);
                $disLike = true;
            } else {
                $disLike = false;
            }
            return $disLike ? redirect()->back()->with('success', 'Comment Dislike Success') : redirect()->back()->with('error', 'Already Dislike The Comment');
        }

        return redirect()->back()->with('error', 'Someting went wrong');
    }
}

//   Distroy  // $deleteComment = Comment::where('reply_id', $id)->orWhere('id', $id)->delete();
