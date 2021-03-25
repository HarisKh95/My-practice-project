<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $req, Closure $next)
    {
        $user=auth()->user()->roles()->orderBy('name')->get();
            foreach($user as $role)
            {

                if ($role->name=='Admin') 
                {
                    return $next($req);
                }

            }
            return response()->json('Not Admin');
        return $next($req);
    }
}
