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
    public function details($id)
    {
        $complain = Complains::find($id);
        return view('VictimDashboards.complainDetails', compact('complain'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'complaint_type' => 'required',
            'description' => 'required',
            'attachment1' => 'image| max:2048 | mimes:jpg,png,jpeg',
        ]);

        Complains::create([
            'complaint_type' => $request->complaint_type,
            'description' => $request->description,
            'anonymous' => isset($request->anonymous) ? 1 : 0,
            'user_id' => auth()->user()->id,
            'attachment1' =>  isset($request->attachment1) ? $request->attachment1->store('complainAttachments', 'public') : null
        ]);

        return redirect()->to('/home')->with('status', 'Complaint has been submitted successfully');
    }

    public function sendComplain(Request $request)
    {
        $this->validate($request, [
            'handle_by' => 'required'
        ]);
        $complain = Complains::find($request->id);
        $complain->handle_by = $request->handle_by;
        $complain->save();
        return redirect()->route('C_PoliceProfile')->with('status', 'Complain has been sent');
    }
    public function assignTo(Request $request)
    {
        $this->validate($request, [
            'assign_to' => 'required'
        ]);
        $complain = Complains::find($request->id);
        $complain->assign_to = $request->assign_to;
        $complain->status = 'Assigned';
        $complain->save();
        return redirect()->route('PoliceHome')->with('status', 'Complain has Assigned');
    }
}
