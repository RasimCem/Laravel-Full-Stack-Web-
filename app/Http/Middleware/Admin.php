<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::user()){
            if(Auth::user()->role=='admin'){
                return $next($request);
            }
        }
            Auth::logout();
            return redirect()->route('home.index')->with('error','Buna izniniz yok!');
    }
}
