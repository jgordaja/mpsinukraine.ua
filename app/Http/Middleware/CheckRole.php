<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class CheckRole
{
//    protected $auth;
//
//    public function __construct(Guard $auth)
//    {
//        $this->auth = $auth;
//    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user()->hasRole($role)) {

            return $next($request);
        } else {
            return response('Unauthorized.', 401);
        }

        //or:
//
//        if ($this->auth->guest()) {
//            if ($request->ajax()) {
//                return response('Unauthorized.', 401);
//            } else {
//                abort(403);
//            }
//        }
//
//        if (auth()->check() && auth()->user()->hasRole($role)) {
//            return $next($request);
//        }
//        $this->role = $request->role;

    }

}
