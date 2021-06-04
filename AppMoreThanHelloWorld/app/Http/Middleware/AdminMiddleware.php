<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $myuser=auth()->user()->getAttributes()['isAdmin'];

        if (!$myuser===1) {
            return redirect('accueil');
        }

        return $next($request);
    }
}
