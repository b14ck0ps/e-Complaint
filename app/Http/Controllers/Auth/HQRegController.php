<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HQRegController extends Controller
{
    public function index()
    {
        return view('Auth.HQRegistration');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255| unique:users',
            'phone' => 'required|numeric | unique:users',
            'dob' => 'required|date',
            'address' => 'required|max:255',
            'nid' => 'required|numeric',
            'password' => 'required|confirmed',
            'profile_pic' => 'image|nullable|max:1999',
        ]);

        User::create([
            'type' => 'HQ',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
            'nid' => $request->nid,
            'password' => bcrypt($request->password),
            'profile_pic' => isset($request->profile_pic) ? $request->profile_pic->store('profile_pics', 'public') : null
        ]);

        return redirect()->route('login');
    }

    public function regNewUser()
    {
        return view('Auth.NewStuffRegistration');
    }
    public function newUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255 | unique:users',
            'type' => 'required',
            'phone' => 'required|numeric | unique:users',
            'dob' => 'required|date',
            'address' => 'required|max:255',
            'nid' => 'required|numeric',
            'password' => 'required|confirmed',
            'profile_pic' => 'image|nullable|max:1999',
        ]);

        User::create([
            'type' => $request->type,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
            'nid' => $request->nid,
            'password' => bcrypt($request->password),
            'profile_pic' => isset($request->profile_pic) ? $request->profile_pic->store('profile_pics', 'public') : null
        ]);

        return redirect()->route('HQProfile');
    }
}
