<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdminUser;
use App\Http\Requests\UpdateEditUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = DB::table('admin_users')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->select('id', 'name', 'email', 'password', 'role', 'image')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function dashboard()
    {
        $adminUsers = AdminUser::count();
        dd($adminUsers);
        return view('dashboard', ['adminUsers' => $adminUsers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = AdminUser::find($id);
        return view('admin.users.edit')->with('users', $user);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEditUserRequest $request, User $user)
    {
        //update data user
        $user = AdminUser::find($id);
        $user->update($request->all());
        return redirect()->route('users.index');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
