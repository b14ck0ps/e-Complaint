<?php

namespace App\Http\Controllers;

use App\Models\Complains;
use Illuminate\Http\Request;

class ComplainsController extends Controller
{
    public function index()
    {
        return view('VictimDashboards.complainbox');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'complaint_type' => 'required',
            'description' => 'required',
            'attachment1' => 'jpg,png,jpeg | max:2048 | mimes:jpg,png,jpeg',
        ]);

        Complains::create([
            'complaint_type' => $request->complaint_type,
            'description' => $request->description,
            'anonymous' => isset($request->anonymous) ? 1 : 0,
            'user_id' => auth()->user()->id,
            'attachment1' => $request->attachment1,
        ]);

        return redirect()->to('/home')->with('status', 'Complaint has been submitted successfully');
    }
}
