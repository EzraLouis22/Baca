<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserControllerUser extends Controller
{
    // Login
    public function login()
    {
        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (auth()->attempt($credentials)) {
            return redirect()->route('user.auth.beranda');
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
        return view('user.register');
    }
    
    public function postRegister(Request $request)
    {
        if (!$request->name || !$request->email || !$request->password) {
            return back()->withErrors(['Semua field harus diisi']);
        }
    
        $email = $request->email;
        $user = User::where('email', $email)->first();
    
        if ($user) {
            return back()->withErrors(['Email sudah digunakan, silakan gunakan email lain']);
        }
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->store('public/pp');
            $user->image = $filename;
        }
    
        $user->save();
    
        return redirect()->route('user.auth.login');
    }
}