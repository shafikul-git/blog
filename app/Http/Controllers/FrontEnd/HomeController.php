<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Setting;
use App\Models\Category;
use App\Models\post\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $settings = Setting::whereIn('key_name', ['firstCategoryCard', 'secondCategoryCard', 'threadCategoryCard', 'fourCategoryCard', 'sliderCategory'])->get();
        $categoryNames = [];
        foreach($settings as $setting){
            array_push($categoryNames, [
                $categoryNames[$setting->key_name] = $setting->value,
            ]);
        }
        // return $categoryNames;
        return view('home', compact('categoryNames'));
    }


    // Hero Section
    public function heroSection()
    {
        $heroSection = Category::with(['posts' => function ($query) {
            $query->latest()->take(1);
        }])->limit(5)->get();

        $returnVal = $heroSection->map(function ($item) {
            if ($item->posts->isEmpty()) {
                return [
                    'category' => [
                        'name' => 'demo Name',
                        'slug' => '#'
                    ],
                    'post' => [
                        'title' => 'demo title',
                        'slug' => '#',
                        'featured_image' => 'https://via.placeholder.com/640x480.png/00dd22?text=posts+omnis',
                        'alt_name' => 'demo',
                        'published_at' => '2024-10-26T01:37:36.000000Z',
                        'content' => 'demo content'
                    ]
                ];
            }
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


    // SPacific Post Category
    public function spacificCategoryPost($cateogryName)
    {
        $post = Post::whereHas('categories', function ($query) use ($cateogryName) {
            $query->where('name', $cateogryName);
        })->with('categories')->limit(6)->get();

        $returnVal = $post->map(function ($item) {
            if ($item->categories->isEmpty()) {
                return [
                    'category' => [
                        'name' => 'demo Name',
                        'slug' => '#'
                    ],
                    'post' => [
                        'title' => 'Not Title Found',
                        'slug' => '#',
                        'featured_image' => 'https://via.placeholder.com/640x480.png/00dd22?text=posts+omnis',
                        'alt_name' => 'No alt_name Found',
                        'meta_title' => 'Not meta_title Found',
                        'meta_keywords' => 'Not meta_keywords Found',
                        'author_id' => 'Not author_id Found',
                        'meta_description' => 'Not meta_description Found',
                        'published_at' => '2024-10-26T01:37:36.000000Z',
                        'content' => 'Not content Found'
                    ]
                ];
            }
            return [
                'category' => [
                    'name' => $item->categories[0]->name,
                    'slug' => $item->categories[0]->slug
                ],
                'post' => [
                    'title' => $this->cutString($item->title, 5),
                    'slug' => $item->slug,
                    'featured_image' => $item->featured_image,
                    'alt_name' => $item->alt_name,
                    'meta_title' => $item->meta_title,
                    'meta_keywords' => $item->meta_keywords,
                    'author_id' => $item->author_id,
                    'meta_description' => $item->meta_description,
                    'published_at' => $item->published_at,
                    'content' => $this->cutString($item->content, 5)
                ]
            ];
        });

        return response()->json(['data' => $returnVal]);
    }


    // String CUt Function
    private function cutString($string, $count)
    {
        $content = strip_tags($string);
        $content = trim($content);

        $words = explode(' ', $content);
        $countWord = count($words);
        return ($countWord > $count) ? implode(' ', array_slice($words, 0, $count)) . '...' :  $contents = implode(' ', $words);
    }
}
