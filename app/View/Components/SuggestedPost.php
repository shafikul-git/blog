<?php

namespace App\View\Components;

use Closure;
use App\Models\post\Post;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class SuggestedPost extends Component
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
        $sessionSuggestedData = Session::get('suggestedPost');
        $suggestData = strtok($sessionSuggestedData, '-');
        $datas = Post::where('title', 'LIKE', '%' . $suggestData . '%')->with('users')->orderByDesc('id')->limit(5)->get();
        // return $datas;
        return view('components.suggested-post', compact('datas'));
    }
}
