<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckStatusUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $statusUser = auth()->user()->status;
        $ruleMiddleware = config('constants.userBanned');

        if ($statusUser->slug === $ruleMiddleware['slug'] && $statusUser->type === $ruleMiddleware['type']) {
            abort(404);
        }

        return $next($request);
    }
}
