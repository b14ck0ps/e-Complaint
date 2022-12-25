<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.Login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }
        if (auth()->user()->type == 'HQ') {
            return redirect()->route('HQProfile');
        }
        if (auth()->user()->type == 'VICTIM') {
            return redirect()->route('VictimProfile');
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
    }
}
