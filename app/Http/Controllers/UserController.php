<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::query();
        if($search = request()->input('search')){
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        $allUsers = $query->paginate(10)->appends(['search' => $search]);
        // // return $allUsers;
        return view('admin.users.all', compact('allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $storeUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return $this->successOrError($storeUser, 'users.index', 'User Added successful', 'Someting went wrong');
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
        $userData = User::find($id);
        return view('admin.users.edit', compact('userData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
        $updateData = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return $this->successOrError($updateData, 'users.index', 'User Data update successful', 'Someting went wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteUser = User::where('id', $id)->delete();
        return $this->successOrError($deleteUser, null, 'User delete successful', 'Someting went wrong');
    }

    // return route sucess or error
    private function successOrError($value, $direct = null, $success = 'success', $error = 'error')
    {
        ($direct == null) ? $redirectRoute = redirect()->back() :  $redirectRoute = redirect()->route($direct);
        return $value ? $redirectRoute->with('success', $success) : $redirectRoute->with('error', $error);
    }
}
