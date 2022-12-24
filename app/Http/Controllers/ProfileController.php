<?php

namespace App\Http\Controllers;

use App\Models\Complains;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function VictimProfile()
    {
        $user  = User::find(auth()->user()->id);
        $complains = Complains::where('user_id', auth()->user()->id)->get();
        return view('VictimDashboards.home', compact('user', 'complains'));
    }

    public function HQProfile()
    {
        $user = User::find(auth()->user()->id);
        $users = User::all();
        return view('HQDashboards.home', compact('user', 'users'));
    }
    public function allComplains()
    {
        $user  = User::find(auth()->user()->id);
        $complains = Complains::where('handle_by', 'Police HQ')->get();
        return view('HQDashboards.allComplains', compact('user', 'complains'));
    }
    //cyber police profile
    public function C_PoliceProfile()
    {
        $user = User::find(auth()->user()->id);
        $complains = Complains::all();
        return view('CyberPoliceDashboards.home', compact('user', 'complains'));
    }

    //police profile
    public function PoliceProfile()
    {
        $user = User::find(auth()->user()->id);
        $complains = Complains::where('handle_by', 'Police Station')->get();
        return view('PoliceHQ.home', compact('user', 'complains'));
    }
}
