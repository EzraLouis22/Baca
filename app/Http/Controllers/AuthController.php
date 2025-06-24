<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Registration successful',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('web')->attempt($credentials)) {
            // Jika pengguna tersebut adalah user, maka redirect ke dashboard user
            return redirect()->route('user.dashboard');
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            // Jika pengguna tersebut adalah admin, maka redirect ke dashboard admin
            return redirect()->route('admin.dashboard');
        } else {
            // Jika pengguna tersebut tidak dapat login, maka tampilkan pesan error
            return redirect()->back()->withErrors(['Invalid credentials']);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function profile()
    {
        return response()->json([
            'user' => auth()->user()
        ]);
    }
}
