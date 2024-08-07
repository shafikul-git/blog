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
        // $mainMenu = Menu::with('subMenu')->get();
        $mainMenu = Menu::with('subMenu')->whereNull('main_menu_id')->get();
        // return $mainMenu;
        $html = "";
        

        
        return $mainMenu;
    }

    public function check()
    {
        $mainMenu = Menu::with('subMenu')->whereNull('main_menu_id')->get();
        return $mainMenu; 
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

