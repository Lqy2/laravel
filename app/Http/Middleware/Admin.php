<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (request()->session()->has('user')) {
            $user = request()->session()->get('user');
            view()->share('user', $user);     //共享用户信息
        } else {
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
