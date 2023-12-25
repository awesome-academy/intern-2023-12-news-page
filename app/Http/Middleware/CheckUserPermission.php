<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $slug = 'user')
    {
        $user = auth()->user();

        if ($user && (strval($user->role->slug) === $slug || strpos($slug, $user->role->slug) !== false)) {
            return $next($request);
        }

        abort(401);
    }
}
