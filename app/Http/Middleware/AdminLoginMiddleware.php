<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request of user
     * @param \Closure                 $next    request
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     if (Auth::check()) {
            $user = Auth::user();
            if ($user->is_admin == 1) {
                return $next($request);
            } else {
                return redirect('/');            }
        } else {
            return redirect('/login');
        }
    }
}
