<?php

namespace App\Http\Controllers\FrontEnd;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\post\Post;
use App\Models\post\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function blog(){
        $blogDatas =  Post::with('users')->orderByDesc('id')->paginate(10);
        // return $blogDatas;
        return view('blog', compact('blogDatas'));
    }

    public function singlePost($slug){
        $singlePostData = Post::where('slug', $slug)->with(['comments' => function($query){
            $query->whereNull('reply_id') // Load only top-level comments
                    ->orderBy('id', 'DESC')
                    ->with('replies'); // Eager load replies
        }])->orderByDesc('id')->firstOrFail();

        $suggestedPostStore = Session::put(['suggestedPost' => $slug]);
        // return $singlePostData;
        return view('singlePost', compact('singlePostData'));
    }

    public function reaction(Request $request, $action){
        if(!Auth::check()){
            return redirect()->back()->with('error', 'Please login then like');
        }
        $request->validate([
            'commentId' => 'required|integer'
        ]);
        Validator::make(['action' => $action], [
            'action' => 'required|string',
        ]);

        $commentId = $request->commentId;
        $commentReaction = session()->get('commentReaction', []);

        if($action === 'like'){
            if(!in_array($commentId, $commentReaction)){
                $like = Comment::where('id', $commentId);
                $like->increment('comment_like');

                $commentReaction[] = $commentId;
                session()->put('commentReaction', $commentReaction);
                $like = true;
            } else{
                $like = false;
            }
            return $like ? redirect()->back()->with('success', 'Comment Like Success') : redirect()->back()->with('error', 'Already Like The Comment');
        }
        if($action === 'dislike'){
            if(in_array($commentId, $commentReaction)){
                $like = Comment::where('id', $commentId);
                $like->decrement('comment_like');

                $commentReaction = array_filter($commentReaction, function($value) use ($commentId) {
                    return $value !== $commentId;
                });
                $commentReaction = array_values($commentReaction);
                session()->put('commentReaction', $commentReaction);
                $disLike = true;
            } else{
                $disLike = false;
            }
            return $disLike ? redirect()->back()->with('success', 'Comment Dislike Success') : redirect()->back()->with('error', 'Already Dislike The Comment');
        }

        return redirect()->back()->with('error', 'Someting went wrong');
    }

// All POst LOad

    // public function allPost(){
    //     $allDataBlog = Category::with('users')->get();
    //     $allDataBlog->each(function ($category) {
    //         $category->posts = $category->posts->take(3);
    //     });
    //     return $allDataBlog;
    // }
}
