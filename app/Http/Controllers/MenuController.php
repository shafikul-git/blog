<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    // public $userId = Auth::user()->id;
    // protected $userName = Auth::user()->name;
    // protected $userEmail = Auth::user()->email;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allMenuData = Menu::get();


        return $allMenuData;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = Auth::user()->id;
        $mainMenu = Menu::where('user_id', $userId)->get(['id', 'menu_name']);
        return view('admin.menu.add', compact('mainMenu'));

        // where('menus.user_id', $userId)
        // // ->join('sub_menus', 'menus.id', '=', 'sub_menus.main_menu_id')
        // ->get(['menus.id', 'menus.menu_name']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_link' => 'required|unique:menus,menu_link',
        ]);

        $menuCreate = Menu::create([
            'menu_name' => $request->menu_name,
            'menu_link' => $request->menu_link,
            'user_id' => Auth::user()->id,
            'menu_icon' => $request->menu_icon,
        ]);

        if ($menuCreate) {
            return redirect()->back()->with('success', 'Menu Addded Successful');
        } else {
            return redirect()->back()->with('error', 'Someting Want wrong Please try again');
        }
    }

    public function subMenuStore(Request $request)
    {
        $request->validate([
            'menu_link' => 'required|unique:menus,menu_link',
            'main_menu_id' => 'required',
        ]);

        $menuCreate = SubMenu::create([
            'menu_name' => $request->menu_name,
            'menu_link' => $request->menu_link,
            'main_menu_id' => $request->main_menu_id,
            'user_id' => Auth::user()->id,
            'menu_icon' => $request->menu_icon,
        ]);

        if ($menuCreate) {
            return redirect()->back()->with('success', 'Sub Menu Addded Successful');
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
