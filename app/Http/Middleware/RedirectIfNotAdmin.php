<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class RedirectIfNotAdmin
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
        $id_role = (Auth::user()->id_role);
       
        if(!(Auth::user()->level_user($id_role) == 'admin')){
           return redirect('home');
        }
        return $next($request);
    }
}
