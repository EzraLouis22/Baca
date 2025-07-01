<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role !== 'admin') {
            Alert::error('Anda bukan admin', 'Error');
            return redirect()->route('login');
        }
        return $next($request);
    }
}