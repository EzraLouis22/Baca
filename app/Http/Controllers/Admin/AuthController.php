<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUser;
use RealRashid\SweetAlert\Facades\Alert;

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
                Alert::success('Success', 'Login Berhasil');
                return redirect()->route('user.auth.beranda');
            }
        } elseif ($request->role == 'admin') {
            if (Auth::guard('admin')->attempt($credential)) {
                Alert::success('Success', 'Login Berhasil');
                return redirect()->route('admin.dashboard');
            }
        }
        Alert::error('Error', 'Login Gagal');
        return redirect()->back();

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('member')->logout();
        Alert::success('Success', 'Logout Berhasil');
        return redirect()->route('root');
    }

    public function register()
    {

        return view('register');
    }

    public function postRegister(Request $request)
    {
        if (!$request->name || !$request->email || !$request->password || !$request->role || !$request->image) {
            Alert::error('Error', 'Data Tidak Lengkap');
            return back();
        }
    
        $email = $request->email;
        $user = User::where('email', $email)->first();
    
        if ($user) {
            Alert::error('Error', 'Email Sudah Terdaftar');
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
        Alert::success('Success', 'Register Berhasil');
        return back();
    }

}
