<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->user() && $request->user()->role_id === 1) {
            return $next($request);
        }

        return redirect('/');
    }
}
