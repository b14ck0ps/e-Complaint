<?php

namespace App\Http\Controllers;

use App\Models\Complains;
use Illuminate\Http\Request;

class archiveController extends Controller
{
    public function index()
    {
        $archive = Complains::where('status', 'Complete')->get();
        return view('HQDashboards.archive', compact('archive'));
    }
}
