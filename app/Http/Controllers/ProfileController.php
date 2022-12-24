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
        $complains = Complains::all();
        return view('HQDashboards.home', compact('user', 'complains'));
    }
    public function allUsers()
    {
        $users = User::all();
        $user  = User::find(auth()->user()->id);
        return view('HQDashboards.allUsers', compact('users', 'user'));
    }
    //cyber police profile
    public function C_PoliceProfile()
    {
        $user = User::find(auth()->user()->id);
        $complains = Complains::all();
        return view('CyberPoliceDashboards.home', compact('user', 'complains'));
    }
}
