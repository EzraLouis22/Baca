<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdminUser;
use App\Http\Requests\UpdateEditUserRequest;
use Illuminate\Support\Facades\Auth;

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
            ->orderBy('id', 'asc')
            ->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function dashboard()
    {
        $adminUsers = AdminUser::count();
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
    public function edit()
    {

    }
    /**
     * Update the specified resource in storage.
     */
    public function update()
    {

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('users.index')->with('error', 'Anda tidak memiliki hak akses untuk menghapus akun');
        }

        $adminUser = AdminUser::find($id);
        if (!$adminUser) {
            return redirect()->route('users.index')->with('error', 'Akun tidak ditemukan');
        }

        $adminUser->delete();
        return redirect()->route('users.index')->with('success', 'Akun berhasil dihapus');
    }
}
