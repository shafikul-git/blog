<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\post\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function blog(){
        $allDataBlog = Post::with('users')->get();
        return $allDataBlog;
        return view('blog');
    }
}
