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
            return abort(404);
        }
        // return $allDataBlog;
        return view('categories', compact('allCategorys'));
    }
}
