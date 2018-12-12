<?php

namespace App\Http\Middleware;

use Closure;

class DormAuth
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
        if ($request->session()->get('dorm_account') == null){
            return redirect('/dorm_index');
        }
        return $next($request);
    }
}
