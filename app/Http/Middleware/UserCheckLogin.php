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
    // public function handle(Request $request, Closure $next, $roles)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('auth-login');
    //     }
    
    //     $user = Auth::user();
    //     if (in_array($user->role_id, $roles)) {
    //         return $next($request);
    //     } else {
    //         return redirect()->route('auth-login')->with('status', 'Mohon maaf, Anda tidak memiliki akses');
    //     }
    // }

    public function handle(Request $request, Closure $next, $roles)
    {
        if(auth()->user()->role_id == $roles){
            return $next($request);
        }
          
        return response()->json(['You do not have permission to access for this page.']);
        /* return response()->view('errors.check-permission'); */
    }
}
