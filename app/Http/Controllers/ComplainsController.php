<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Complains;
use App\Models\User;
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
        $comments = Comments::where('complain_id', $id)->latest()->paginate(2);
        //map investigaor name with comments
        $comments->map(function ($comment) {
            $comment->investigaor = User::find($comment->user_id)->name;
            return $comment;
        });
        if (auth()->user()->type == 'HQ') {
            $agents = User::where('type', 'SPECIAL_AGENT')->get();
            return view('VictimDashboards.complainDetails', compact('complain', 'agents', 'comments'));
        }
        if (auth()->user()->type == 'POLICE') {
            $agents = User::where('type', 'QR_AGENT')->get();
            return view('VictimDashboards.complainDetails', compact('complain', 'agents', 'comments'));
        }
        return view('VictimDashboards.complainDetails', compact('complain', 'comments'));
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
            'assign_to' => 'required',
            'investigator' => 'required'
        ]);
        $complain = Complains::find($request->id);
        $complain->assign_to = $request->assign_to;
        $complain->investigator = $request->investigator;
        $complain->status = 'Investigating';
        $complain->save();
        return redirect()->route('PoliceHome')->with('status', 'Complain is processing');
    }
    public function assignAgent(Request $request)
    {
        $this->validate($request, [
            'investigator' => 'required'
        ]);
        $complain = Complains::find($request->id);
        $complain->investigator = $request->investigator;
        $complain->status = 'Investigating';
        $complain->save();
        return redirect()->route('HQProfile')->with('status', 'Complain has Assigned');
    }
    public function complete(Request $request)
    {
        $complain = Complains::find($request->id);
        $complain->status = 'Complete';
        $complain->save();
        return redirect()->to('/')->with('status', 'Complain has Assigned');
    }
}
