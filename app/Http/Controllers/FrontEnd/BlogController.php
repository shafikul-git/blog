<?php

namespace App\Http\Controllers\FrontEnd;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\post\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function blog(){
        $blogDatas =  Post::with('users')->orderByDesc('id')->paginate(10);
        // return $blogDatas;
        return view('blog', compact('blogDatas'));
    }

    public function singlePost($slug){
        $singlePostData = Post::where('slug', $slug)->orderByDesc('id')->firstOrFail();

        $suggestedPostStore = Session::put(['suggestedPost' => $slug]);
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
