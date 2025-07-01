<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUser;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credential = $request->only('email', 'password' , 'role');

        if ($request->role == 'member') {
            if (Auth::guard('member')->attempt($credential)) {
                return redirect()->route('user.auth.beranda');
            }
        } elseif ($request->role == 'admin') {
            if (Auth::guard('admin')->attempt($credential)) {
                return redirect()->route('admin.dashboard');
            }
        }
        return redirect()->back();

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('member')->logout();
        return redirect()->route('root');
    }

    public function register()
    {

        return view('register');
    }

    public function postRegister(Request $request)
    {
        if (!$request->name || !$request->email || !$request->password || !$request->role || !$request->image) {
            return back();
        }
    
        $email = $request->email;
        $user = User::where('email', $email)->first();
    
        if ($user) {
            return back();
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
        return back();
    }

}
