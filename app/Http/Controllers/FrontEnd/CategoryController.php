<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        $allCategorys = Category::with(['users', 'posts' => function($query){
            $query->orderBy('id', 'DESC')->limit('4');
        }])->get();

        if($allCategorys->isEmpty()){
            return abort(404, 'No Content Found Database');
        }

        // return $allDataBlog;
        return view('categories', compact('allCategorys'));
    }

    public function signleCateogry($slug){
        $datas = Category::where('slug', $slug)->firstOrFail();
        // return $datas;
        $post = $datas->posts()->orderBy('id', 'DESC')->paginate(5);
        return view('signleCateogry', compact('datas', 'post'));
    }
}
