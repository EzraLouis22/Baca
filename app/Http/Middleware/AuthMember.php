<?php
namespace App\Http\Middleware;

use Closure;
use Alert;
use Illuminate\Support\Facades\Auth;

class AuthMember
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role !== 'member') {
            Alert::error('Anda bukan member', 'Error');
            return redirect()->route('login');
        }
        return $next($request);
    }
}