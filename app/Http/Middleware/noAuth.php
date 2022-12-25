<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class noAuth
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
        if (auth()->check()) {
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
            if (auth()->user()->type == 'VICTIM') {
                return redirect()->route('VictimProfile');
            }
        }
        return $next($request);
    }
}
