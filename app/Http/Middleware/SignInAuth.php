<?php

namespace App\Http\Middleware;

use Closure;

class SignInAuth
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
        if ($request->session()->get('signIn_account') == null){
            return redirect('/signIn_index');
        }
        return $next($request);
    }
}
