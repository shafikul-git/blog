<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\post\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home(){
        return view('home');
    }

    public function heroSection(){
        $allPost = Post::all();
        return response()->json([
            'data' => $allPost,
        ]);
    }
}
