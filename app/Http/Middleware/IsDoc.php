<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsDoc
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $req, Closure $next,...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if(Auth::guard($guard)->check())
            {
                $user=auth()->user()->roles;
                foreach($user as $role)
                {

                    if ($role->name=='Doctor') 
                    {
                        return $next($req);
                    }

                }
            }
        }
            return redirect('login1')->withErrors('Please login As Doctor');
            return response()->json('Not Doctor');
        // return $next($req);
    }
}
