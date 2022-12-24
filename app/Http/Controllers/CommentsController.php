<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'complain_id' => 'required',
        ]);
        $comment = new Comments();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->complain_id = $request->complain_id;
        $comment->save();
        return back();
    }
}
