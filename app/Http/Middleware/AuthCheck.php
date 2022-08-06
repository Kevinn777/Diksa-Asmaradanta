<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, String $authCheck)
    {
        if(auth()->user()){
            if($authCheck == 'admin' && auth()->user()->role != 'admin'){
                return redirect()->back();
            }
            return $next($request);
        } else {
            return redirect('/login')->with(['not_login' => 'Silahkan Login Terlebih Dahulu']);
        }
    }
}
