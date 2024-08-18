<?php

namespace App\View\Components;

use Closure;
use App\Models\post\Post;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class recentPost extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $recentPost = Post::with('users')->orderByDesc('id')->limit(5)->get();
        // return $recentPost;
        return view('components.recent-post', compact('recentPost'));
    }
}
