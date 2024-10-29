<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $categorys = Category::all(['name']);
        $settings = Setting::whereIn('key_name', ['firstCategoryCard', 'secondCategoryCard', 'threadCategoryCard', 'fourCategoryCard', 'sliderCategory'])->get();

        // return $settings;
        return view('admin.setting.index', compact(['categorys','settings']));
    }

    public function store(Request $request)
    {
        if ($request->has('firstCategoryCard')) {
            $request->validate(['firstCategoryCard' => 'required|string',]);
        }
        if ($request->has('secondCategoryCard')) {
            $request->validate(['secondCategoryCard' => 'required|string',]);
        }
        if ($request->has('threadCategoryCard')) {
            $request->validate(['threadCategoryCard' => 'required|string',]);
        }
        if ($request->has('fourCategoryCard')) {
            $request->validate(['fourCategoryCard' => 'required|string',]);
        }
        if ($request->has('sliderCategory')) {
            $request->validate(['sliderCategory' => 'required|string',]);
        }

        foreach ($request->all() as $key => $value) {
            if ($key === '_token') {
                continue;
            }
            Setting::updateOrCreate(['key_name' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Setting Update Succesful');
    }
}
