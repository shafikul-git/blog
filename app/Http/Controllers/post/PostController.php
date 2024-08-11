<?php

namespace App\Http\Controllers\post;

use App\Models\post\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            'title' => 'required',
            'slug' => 'required',
            'meta_title' => 'required',
            'status' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'content' => 'required',
            'featured_image' => 'required',
            'published_at' => 'required',
        ]);

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $altName = $file->getClientOriginalName();
            $fileEx = $file->getClientOriginalExtension();
            $path = $file->storeAs('post', uniqid() . time() . '.' . $fileEx, 'public');
        }

        // Replace non-alphanumeric characters with hyphens
        $cleanedString = preg_replace('/[^a-zA-Z0-9]/', '-', $request->slug);
        // Remove multiple hyphens (optional)
        $cleanedString = preg_replace('/-+/', '-', $cleanedString);
        $createSlug = trim($cleanedString, '-');

        $store = Post::create([
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
            'author_id' => Auth::user()->id,
        ]);

        return $this->returnRoute($store, null, 'Post create successfull', 'Someting want wrong');
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
            'title' => 'required',
            'slug' => 'required',
            'meta_title' => 'required',
            'status' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'content' => 'required',
            'published_at' => 'required',
        ]);

        if ($request->hasFile('featured_image')) {
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
        if(Storage::disk('public')->exists($fileName->featured_image)){
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
}
