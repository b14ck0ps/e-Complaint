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
}
