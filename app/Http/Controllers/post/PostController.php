<?php

namespace App\Http\Controllers\post;

use App\Models\post\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Post::query();
        if($search = request()->input('search')){
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
            'published_at' => 'required',
            'featured_image' => 'required',
        ]);

        if($request->hasFile('featured_image')){
            $file = $request->file('featured_image');
            $fileName = $file->getClientOriginalName();
            $fileEx = $file->getClientOriginalExtension();
            echo $fileName .  $fileEx;
        }

        // return $request;
      
        
        // $store = Post::create([
        //     'name' => $request->name,
        // ]);

        // return $this->returnRoute($store, null, 'Post create successfull', 'Someting want wrong');
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
        $data = Post::find($id);
        return view('admin.post.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $update = Post::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return $this->returnRoute($update, null, 'Post Update successfull', 'Someting want wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = Post::where('id', $id)->delete();
        return $this->returnRoute($deleteData);
    }

    // redirect route
    private function returnRoute($val, $route = null, $success = 'success', $error = 'error'){
        $checkRoute = ($route == null) ? redirect()->back() : redirect()->route($route);
        return $val ? $checkRoute->with('success', $success) : $checkRoute->with('error', $error);
    }
}
