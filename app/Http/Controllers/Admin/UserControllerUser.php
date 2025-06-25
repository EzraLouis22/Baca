<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUser;

class UserControllerUser extends Controller
{
    // Login
    public function login()
    {
        return view('root');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (auth()->attempt($credentials)) {
            return redirect()->route('beranda');
        }

        return back()->withErrors(['Invalid email or password']);
    }

    public function beranda()
    {
        return view('user.home.beranda');
    }

    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect()->route('root');
    }

    // Register
    public function register()
    {
        return view('register');
    }
    
    public function postRegister(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin_users',
            'password' => 'required',
            'role' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->store('image', 'public');
            $validated['image'] = $filename;
        }

        AdminUser::create($validated);

        return redirect()->route('root')->with('success', 'Registrasi berhasil');
    }
    public function profile()
    {
        return view('user.profile.index');
    }

    public function edit(AdminUser $adminUsers)
    {
        return view('admin.users.edit', compact('adminUsers'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEditUserRequest $request, AdminUser $adminUsers)
    {
        //update data user
        $validate = $request->validated();
        $adminUsers->update($validate);
        return redirect()->route('users.index')->with('success', 'Edit User Successfully');  
    }
}