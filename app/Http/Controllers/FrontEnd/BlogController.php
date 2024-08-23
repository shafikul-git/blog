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
                    ->with('replies'); // Eager load replies
        }])->firstOrFail();

        Session::put(['suggestedPost' => $slug]);
        // return $singlePostData;
        return view('singlePost', compact('singlePostData'));
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
