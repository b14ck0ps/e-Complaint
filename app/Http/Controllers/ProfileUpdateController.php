<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileUpdateController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('edit', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255| unique:users,email,' . auth()->user()->id,
            'phone' => 'required|numeric | unique:users,phone,' . auth()->user()->id,
            'dob' => 'required|date',
            'address' => 'required|max:255',
            'nid' => 'required|numeric',
        ]);

        User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
            'nid' => $request->nid,
        ]);


        if (isset($request->password)) {
            $this->validate($request, [
                'password' => 'required|confirmed',
            ]);
            User::find(Auth::user()->id)->update([
                'password' => bcrypt($request->password),
            ]);
        }

        if (isset($request->profile_pic)) {
            $oldProfilePic = User::find(Auth::user()->id)->profile_pic;
            $this->validate($request, [
                'profile_pic' => 'image|max:1999',
            ]);
            User::find(Auth::user()->id)->update([
                'profile_pic' =>  $request->profile_pic->store('profile_pics', 'public')
            ]);
            $oldProfilePic ? Storage::disk('public')->delete($oldProfilePic) : '';
        }

        return redirect()->to('/');
    }
}
