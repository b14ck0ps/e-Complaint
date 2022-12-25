<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (auth()->user()->type == 'HQ') {
                    return redirect()->route('HQProfile');
                }
                if (auth()->user()->type == 'CYBER_POLICE') {
                    return redirect()->route('C_PoliceProfile');
                }
                if (auth()->user()->type == 'POLICE') {
                    return redirect()->route('PoliceHome');
                }
                if (auth()->user()->type == 'SPECIAL_AGENT') {
                    return redirect()->route('agentHome');
                }
                if (auth()->user()->type == 'QR_AGENT') {
                    return redirect()->route('qrHome');
                }
                // return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
