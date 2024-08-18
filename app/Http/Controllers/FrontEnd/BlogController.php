<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Category;
use App\Models\post\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function blog(){
        $blogDatas = Category::with(['users', 'posts' => function($query){
            $query->orderBy('id', 'DESC')->limit('4');
        }])->get();
        if($blogDatas->isEmpty()){
            return abort(404);
        }
        // return $allDataBlog;
        return view('blog', compact('blogDatas'));
    }

    public function singlePost($slug){
        $datas = Post::where('slug', $slug)->get();
        if($datas->isEmpty()){
            return abort(404);
        }
        $singlePostData = $datas[0];
        // return $datas;
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
