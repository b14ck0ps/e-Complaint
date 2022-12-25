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
        $complains = Complains::where('user_id', auth()->user()->id)->paginate(9);
        return view('VictimDashboards.home', compact('user', 'complains'));
    }

    public function HQProfile()
    {
        $user = User::find(auth()->user()->id);
        $users = User::where('type', '!=', 'VICTIM')->paginate(9);
        return view('HQDashboards.home', compact('user', 'users'));
    }
    public function allComplains()
    {
        $user  = User::find(auth()->user()->id);
        $complains = Complains::where('handle_by', 'Police HQ')->paginate(9);
        return view('HQDashboards.allComplains', compact('user', 'complains'));
    }
    //cyber police profile
    public function C_PoliceProfile()
    {
        $user = User::find(auth()->user()->id);
        $complains = Complains::paginate(9);
        return view('CyberPoliceDashboards.home', compact('user', 'complains'));
    }

    //police profile
    public function PoliceProfile()
    {
        $user = User::find(auth()->user()->id);
        $complains = Complains::where('handle_by', 'Police Station')->paginate(9);
        return view('PoliceStation.home', compact('user', 'complains'));
    }

    //agent profile
    public function agentProfile()
    {
        $user = User::find(auth()->user()->id);
        $complains = Complains::where('investigator', auth()->user()->name)->paginate(9);
        return view('InvestigatorsDashboards.agent', compact('user', 'complains'));
    }
    //QR agent profile
    public function qrProfile()
    {
        $user = User::find(auth()->user()->id);
        $complains = Complains::where('investigator', auth()->user()->name)->paginate(9);
        return view('InvestigatorsDashboards.QRAgent', compact('user', 'complains'));
    }
}
