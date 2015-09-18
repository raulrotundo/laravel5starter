<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param permission as string
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!app('Illuminate\Contracts\Auth\Guard')->guest()) {
            if ($request->user()->can($request->route()->getActionName())) {
                return $next($request);
            }
            return $request->ajax ? response('Unauthorized.', 401) : response()->view('admin.errors.401', [], 401);;
        }
    }
}
