<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                $roleId = $user->role_id;
                switch ($roleId) {
                    case 1:
                        return redirect()->route('dashboard-bendahara');
                    case 2:
                        return redirect()->route('dashboard-manajer');
                    case 3:
                        return redirect()->route('dashboard-pemeriksa');
                    case 4:
                        return redirect()->route('dashboard-pemohon');
                    default:
                        // Tambahkan logika penanganan jika role_id tidak sesuai
                        return redirect()->route('auth-login')->with('status', 'Anda tidak memiliki hak akses!');
                }
            }
        }

        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect()->route('profile');
        //         // return redirect()->route('auth-login')->with('status', 'Anda tidak memiliki hak akses!');
        //         // return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        return $next($request);
    }
}
