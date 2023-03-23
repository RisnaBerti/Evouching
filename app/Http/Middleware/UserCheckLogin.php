<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $rules)
    {
        if (!Auth::check()) {
            return redirect()->route('auth-login');
        }

        $user = Auth::user();
        if ($user->role_id == $rules) {
            return $next($request);
        } else {
            return redirect('/auth-login')->with('error', 'Mohon maaf, Anda tidak memiliki akses');
        }
    }
}
