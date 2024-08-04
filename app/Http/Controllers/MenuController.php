<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::user()->id;
        $mainMenu = Menu::where('user_id', $userId)->get(['id', 'menu']);
        return view('admin.menu.add', compact('mainMenu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(empty($request->menu) && empty($request->sub_menu)){
            return redirect()->back()->with('error', 'Menu Or sub menu any one required'); 
        }
        
        $userId = Auth::user()->id;
        $request->validate([
            'menu_link' => 'required|url|unique:menus,menu_link',
        ]);

        $menuCreate = Menu::create([
            'menu' => $request->menu,
            'sub_menu' => $request->sub_menu,
            'menu_link' => $request->menu_link,
            'main_menu_id' => $request->main_menu_id,
            'user_id' => $userId,
        ]);

        if ($menuCreate) {
            return redirect()->back()->with('success', 'Menu Addded Successful');
        } else {
            return redirect()->back()->with('error', 'Someting Want wrong Please try again');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
