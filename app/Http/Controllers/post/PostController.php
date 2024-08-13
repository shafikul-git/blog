<?php

namespace App\Http\Controllers\post;

use App\Models\post\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Post::query();
        if ($search = request()->input('search')) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }
        $allData = $query->paginate(10)->appends(['search' => $search]);
        return view('admin.post.all', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'status' => 'required|in:draft,published,archived,pending',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'content' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:10000',
            'published_at' => 'required|date',
        ]);
        // return $request;
        $content = $request->content;
        // Regular expression to match base64-encoded images with specific formats
        $pattern = '/data:image\/(jpeg|png|gif|avif|jpg|webp);base64,([^\"]*)/';

        // Use preg_match_all to find all matches
        preg_match_all($pattern, $content, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $fileType = $match[1]; //file Extention ...
            $fileData = base64_decode($match[2]); //Base64 Decode
            $renameFile = uniqid() . time() . '.' . $fileType;
            $filePath = 'post/' . $renameFile;
            Storage::disk('public')->put($filePath, $fileData);
            $content = str_replace($match[0], asset('storage/' . $filePath), $content);
        }

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $altName = $file->getClientOriginalName();
            $fileEx = $file->getClientOriginalExtension();
            $path = $file->storeAs('post', uniqid() . time() . '.' . $fileEx, 'public');
        }

        // Post
        $post = Post::create([
            'title' => $request->title,
            'slug' => $this->slugCreate($request->slug),
            'meta_title' => $request->meta_title,
            'status' => $request->status,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'content' => $content,
            'featured_image' => $path,
            'alt_name' => $altName,
            'published_at' => $request->published_at,
            'author_id' => Auth::user()->id,
        ]);

        // Category
        $categoryIds = [];
        if ($request->category) {
            $request->validate([
                'category' => 'required|array'
            ]);

            foreach ($request->category as $category) {
                $category = Category::updateOrCreate(
                    [
                        'name' => $category,
                    ],
                    [
                        'name' => $category,
                        'slug' => $this->slugCreate($category),
                        'description' => $category,
                        'author_id' => Auth::user()->id,
                    ]
                );
                array_push($categoryIds, $category->id);
            }
        } else{
            $category = Category::updateOrCreate(
                [
                    'name' => 'uncategory',
                ],
                [
                    'name' => 'uncategory',
                    'slug' => $this->slugCreate('uncategory'),
                    'description' => 'uncategory',
                    'author_id' => Auth::user()->id,
                ]
            );
            array_push($categoryIds, $category->id);
        }
        $post->categories()->sync($categoryIds);

        // Tag
        if ($request->tags != null) {
            $request->validate([
                'tags' => 'required|string'
            ]);

            $tagAll = explode(',', $request->tags);
            $tagId = [];

            foreach ($tagAll as $tag) {
                $tags = Tag::updateOrCreate(
                    [
                        'name' => $tag,
                    ],
                    [
                        'name' => $tag,
                        'slug' => $this->slugCreate($tag),
                        'author_id' => Auth::user()->id,
                    ]
                );
                array_push($tagId, $tags->id);
            }
            $post->tags()->sync($tagId);
        }
        
        return $post ? redirect()->route('post.index')->with('success', 'Post create successfull') : redirect()->back()->with('error', 'Someting want wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $postData = Post::find($id);
        return view('admin.post.edit', compact('postData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'status' => 'required|in:draft,published,archived,pending',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'content' => 'required',
            'published_at' => 'required|date',
        ]);

        if ($request->hasFile('featured_image')) {
            $request->validate([
                'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:10000',
            ]);

            $file = $request->file('featured_image');
            $altName = $file->getClientOriginalName();
            $fileEx = $file->getClientOriginalExtension();
            $path = $file->storeAs('post', uniqid() . time() . '.' . $fileEx, 'public');
            if (Storage::disk('public')->exists($request->old_img)) {
                Storage::disk('public')->delete($request->old_img);
            }
        } else {
            $altName = $request->alt_name;
            $path = $request->old_img;
        }

        // Create Slug
        $cleanedString = preg_replace('/[^a-zA-Z0-9]/', '-', $request->slug);
        $cleanedString = preg_replace('/-+/', '-', $cleanedString);
        $createSlug = trim($cleanedString, '-');

        $update = Post::where('id', $id)->update([
            'title' => $request->title,
            'slug' => $createSlug,
            'meta_title' => $request->meta_title,
            'status' => $request->status,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'content' => $request->content,
            'featured_image' => $path,
            'alt_name' => $altName,
            'published_at' => $request->published_at,
        ]);

        return $this->returnRoute($update, 'post.index', 'Post Update successfull', 'Someting want wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fileName = Post::find($id);
        if (Storage::disk('public')->exists($fileName->featured_image)) {
            Storage::disk('public')->delete($fileName->featured_image);
        }
        $deleteData = Post::where('id', $id)->delete();
        return $this->returnRoute($deleteData, null, 'Post Delete Successful', 'someting went wrong');
    }

    // redirect route
    private function returnRoute($val, $route = null, $success = 'success', $error = 'error')
    {
        $checkRoute = ($route == null) ? redirect()->back() : redirect()->route($route);
        return $val ? $checkRoute->with('success', $success) : $checkRoute->with('error', $error);
    }

    private function slugCreate($value)
    {
        // Replace non-alphanumeric characters with hyphens
        $cleanedString = preg_replace('/[^a-zA-Z0-9]/', '-', $value);
        // Remove multiple hyphens (optional)
        $cleanedString = preg_replace('/-+/', '-', $cleanedString);
        return trim($cleanedString, '-');
    }
}
