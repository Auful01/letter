<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
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
        // return $next($request);
        if (!$request->user()->hasRole($role)) {
            return response()->view('401', [], 403);
        }

        if (!$request->user()->hasRole($role) == 'Kepala Desa') {
            return $next($request);
        }
        if (!$request->user()->hasRole($role) == 'Sekretaris') {
            return $next($request);
        }
        return $next($request);
    }
}
