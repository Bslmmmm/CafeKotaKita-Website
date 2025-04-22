<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
           
            return $next($request);
        }
        abort(403);
    }
}