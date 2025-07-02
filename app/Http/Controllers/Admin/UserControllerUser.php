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
        // Validasi input
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin_users,email',
            'password' => 'required|min:6',
            'role' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar ke folder storage/app/public/images
        $imagePath = $request->file('image')->store('images', 'public');

        // Buat user baru
        $user = AdminUser::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
            'image' => $imagePath,
        ]);

        // Login user
        Auth::guard('member')->login($user); // atau 'admin' sesuai kebutuhan

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