<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $query = Category::query();
        if ($search = request()->input('search')) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }
        $allData = $query->paginate(10)->appends(['search' => $search]);
        return view('admin.categories.all', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required',
        ]);

        // Replace non-alphanumeric characters with hyphens
        $cleanedString = preg_replace('/[^a-zA-Z0-9]/', '-', $request->slug);
        // Remove multiple hyphens (optional)
        $cleanedString = preg_replace('/-+/', '-', $cleanedString);
        $createSlug = trim($cleanedString, '-');

        $store = Category::create([
            'name' => $request->name,
            'slug' => $createSlug,
            'description' => $request->description,
            'author_id' => Auth::user()->id,
        ]);

        return $store ? redirect()->route('category.index')->with('success', 'Category added succesful') : redirect()->back()->with('error', 'Someting went wrong');
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
        $categoryData = Category::find($id);
        return view('admin.categories.edit', compact('categoryData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required',
        ]);

        // Create Slug
        $cleanedString = preg_replace('/[^a-zA-Z0-9]/', '-', $request->slug);
        $cleanedString = preg_replace('/-+/', '-', $cleanedString);
        $createSlug = trim($cleanedString, '-');

        $update = Category::where('id', $id)->update([
            'name' => $request->name,
            'slug' => $createSlug,
            'description' =>$request->description,
        ]);

        return $update ? redirect()->route('category.index')->with('success', 'Category Update succesful') : redirect()->back()->with('error', 'Someting went wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = Category::where('id', $id)->delete();
        return $deleteData ? redirect()->route('category.index')->with('success', 'Category Delete succesful') : redirect()->route('category.index')->with('error', 'Someting went wrong');
    }
}
