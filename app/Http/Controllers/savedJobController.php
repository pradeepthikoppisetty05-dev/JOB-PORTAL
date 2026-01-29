<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class savedJobController extends Controller
{
    public function store(Position $position){
        Auth::user()->savedPositions()->syncWithoutDetaching($position->id);
        return back()->with('save','Job saved');
    }

    public function destroy(Position $position){
      

        Auth::user()->savedPositions()->detach($position->id);
        return back()->with('unsave','Job Unsaved');
    }
    
    public function index()
    {
    $user = Auth::user()->load('savedPositions');

    return view('applicant.saved', compact('user'));
    }
}
