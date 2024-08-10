<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allMenuView = Menu::with('subMenu')->whereNull('main_menu_id')->get();
        return view('admin.menu.view', compact('allMenuView'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mainMenu = Menu::get();
        return view('admin.menu.add', compact('mainMenu'));
        // return $mainMenu;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (empty($request->menu_name) && empty($request->sub_menu_name)) {
            return redirect()->back()->with('error', 'Please fillup menu or submenu');
        }
        if (!empty($request->menu_name) && !empty($request->sub_menu_name)) {
            return redirect()->back()->with('error', 'Please fillup One Menu');
        }

        if (!empty($request->sub_menu_name)) {
            $request->validate([
                'main_menu_id' => 'required',
            ]);
        }

        $request->validate([
            'menu_link' => [
                'required',
                'unique:menus,menu_link',
                'regex:/^\/\S*$/'
            ],
        ]);

        $menuCreate = Menu::create([
            'menu_name' => $request->menu_name,
            'sub_menu_name' => $request->sub_menu_name,
            'menu_link' => $request->menu_link,
            'main_menu_id' =>  $request->main_menu_id,
            'user_id' => Auth::user()->id,
            'menu_icon' => $request->menu_icon,
        ]);

        if ($menuCreate) {
            return redirect()->route('menu.index')->with('success', 'Menu Addded Successful');
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
        $menuData = Menu::where('id', $id)->get();
        // return $menuData[0]->id;
        return view('admin.menu.edit', compact('menuData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (empty($request->menu_name)) {
            return redirect()->back()->with('error', 'Please fillup Input box');
        }
        if (empty($request->sub_menu_name)) {
            return redirect()->back()->with('error', 'Please fillup Input box');
        }

        $request->validate([
            'menu_link' => [
                'required',
                'unique:menus,menu_link',
                'regex:/^\/\S*$/'
            ],
        ]);
        $menuUpdate = Menu::where('id', $id)->update([
            'menu_name' => $request->menu_name,
            'sub_menu_name' => $request->sub_menu_name,
            'menu_link' => $request->menu_link,
            'menu_icon' => $request->menu_icon,
        ]);

        if ($menuUpdate) {
            return redirect()->route('menu.index')->with('success', 'Menu Update Successful');
        } else {
            return redirect()->back()->with('error', 'Someting Want wrong Please try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subMenuDelete = Menu::where('main_menu_id', $id)->delete();
        $deleteMenu = Menu::where('id', $id)->delete();
        if ($deleteMenu && $subMenuDelete) {
            return redirect()->back()->with('success', 'Menu Delete Successful');
        } else {
            return redirect()->back()->with('error', 'Someting went wrong');
        }
    }
}
