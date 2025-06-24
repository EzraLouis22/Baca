<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMember
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role !== 'member') {
            return redirect()->route('login');
        }
        return $next($request);
    }
}