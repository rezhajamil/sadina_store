<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        // ddd($user);

        if ($user) {
            if ($user && $user->role == $role) {
                return $next($request);
            } else {
                abort(403);
            }
        } else {
            return redirect()->route('admin.login');
        }

        // return redirect()->route('home')->with('error', 'Unauthorized Access!');
    }
}
