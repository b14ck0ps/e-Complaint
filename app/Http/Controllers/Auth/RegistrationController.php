<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('Auth.Registration');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255| unique:users',
            'phone' => 'required|numeric| unique:users',
            'dob' => 'required|date',
            'address' => 'required|max:255',
            'nid' => 'required|numeric',
            'password' => 'required|confirmed',
            'profile_pic' => 'image|nullable|max:1999',
        ]);

        User::create([
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
}
