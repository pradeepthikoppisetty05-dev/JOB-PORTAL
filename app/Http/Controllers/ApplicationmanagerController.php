<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationmanagerController extends Controller
{
    public function index(Position $position){

        abort_unless($position->employer_id === Auth::id(), 403);

        $applications= $position->applications()->with('applicant')->get();

        return view('employer.index',compact('position', 'applications'));
    }

    public function update(Request $request, Application $application){

        abort_unless($application->position->employer_id === Auth::id(), 403);

        $request->validate([
            'status'=> 'required|in:applied,shortlisted,rejected',
        ]);

        $application->update([
            'status'=> $request->status,
        ]);

        
        return back()->with('update','updated successfully');

    }
}
