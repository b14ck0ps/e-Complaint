<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class investigator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->user()->type != 'SPECIAL_AGENT') {
            if (auth()->user()->type != 'QR_AGENT') {
                return redirect()->route('login');
            }
        }
        return $next($request);
    }
}