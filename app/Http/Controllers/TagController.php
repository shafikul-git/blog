<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Tag::query();
        if ($search = request()->input('search')) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }
        $allData = $query->paginate(10)->appends(['search' => $search]);
        return view('admin.tag.all', compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Gate::allows('AdminAndEditor')) {
            return abort(403, 'Not Permetion you');
        }
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);

        // Replace non-alphanumeric characters with hyphens
        $cleanedString = preg_replace('/[^a-zA-Z0-9]/', '-', $request->slug);
        // Remove multiple hyphens (optional)
        $cleanedString = preg_replace('/-+/', '-', $cleanedString);
        $createSlug = trim($cleanedString, '-');

        $store = Tag::create([
            'name' => $request->name,
            'slug' => $createSlug,
            'author_id' => Auth::user()->id,
        ]);

        return $store ? redirect()->route('tag.index')->with('success', 'Tag added succesful') : redirect()->back()->with('error', 'Someting went wrong');
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
        $tagData = Tag::find($id);
        return view('admin.tag.edit', compact('tagData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Gate::allows('AdminAndEditor')) {
            return abort(403, 'Not Permetion you');
        }
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
        ]);

        // Create Slug
        $cleanedString = preg_replace('/[^a-zA-Z0-9]/', '-', $request->slug);
        $cleanedString = preg_replace('/-+/', '-', $cleanedString);
        $createSlug = trim($cleanedString, '-');

        $update = Tag::where('id', $id)->update([
            'name' => $request->name,
            'slug' => $createSlug,
        ]);

        return $update ? redirect()->route('tag.index')->with('success', 'Tag Details Update succesful') : redirect()->back()->with('error', 'Someting went wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('AdminAndEditor')) {
            return abort(403, 'Not Permetion you');
        }
        $deleteData = Tag::where('id', $id)->delete();
        return $deleteData ? redirect()->route('tag.index')->with('success', 'Tag Delete succesful') : redirect()->route('tag.index')->with('error', 'Someting went wrong');
    }
}
