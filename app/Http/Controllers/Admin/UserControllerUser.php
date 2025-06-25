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
        Auth::logout();
        return redirect()->route('root');
    }

    // Register
    public function register()
    {
        return view('register');
    }
    
    public function postRegister(Request $request)
    {
        if (!$request->name || !$request->email || !$request->password) {
            return back()->withErrors(['Semua field harus diisi']);
        }
    
        $email = $request->email;
        $user = AdminUser::where('email', $email)->first();
    
        if ($user) {
            return back()->withErrors(['Email sudah digunakan, silakan gunakan email lain']);
        }
    
        $user = new AdminUser();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'member';
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->store('public/pp');
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