<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class EnsureTokenIsValid
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('access_token')) {
            return redirect()->route('login')->withErrors(['error' => 'Please log in first.']);
        }
        return $next($request);
    }
}
