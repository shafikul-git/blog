<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Category;
use App\Models\post\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function heroSection()
    {
        $heroSection = Category::with(['posts' => function ($query) {
            $query->latest()->take(1);
        }])->limit(5)->get();

        $returnVal = $heroSection->map(function ($item) {
            return [
                'category' => [
                    'name' => $item->name,
                    'slug' => $item->slug
                ],
                'post' => [
                    'title' => $this->cutString($item->posts[0]->title, 5),
                    'slug' => $item->posts[0]->slug,
                    'featured_image' => $item->posts[0]->featured_image,
                    'alt_name' => $item->posts[0]->alt_name,
                    'published_at' => $item->posts[0]->published_at,
                    'content' => $this->cutString($item->posts[0]->content, 5)
                ]
            ];
        });
        return response()->json(['data' => $returnVal]);
    }

    private function cutString($string, $count){

        $content = strip_tags($string);
        $content = trim($content);

        $words = explode(' ', $content);
        $countWord = count($words);
        return ($countWord > $count) ? implode(' ', array_slice($words, 0, $count)) . '...' :  $contents = implode(' ', $words); 
    }
}
