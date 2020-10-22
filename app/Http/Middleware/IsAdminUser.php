<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()) {
            return redirect('/login');
        }
        if (!$request->user()->is_admin) {
            return abort(404);
        }
        return $next($request);
    }
}
