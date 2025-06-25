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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:member,admin', // opsional: batasi role
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = new AdminUser();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->role = 'member';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/pp', $filename);
            $user->image = $filename;
        }

        $user->save();

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