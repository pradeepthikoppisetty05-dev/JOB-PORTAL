<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
        public function store(Request $request, Position $position){

           $alreadyapplied=Application::where('position_id',$position->id)
                                        ->where('applicant_id',Auth::id())
                                        ->exists();

            if($alreadyapplied){
                return back()->withErrors('You already applied to this job');
            }

            $request->validate([
                'resume'=> 'required|mimes:pdf,doc,docx|max:2048',
            ]);

            $path=$request->file('resume')->store('resumes','public');

            Application::create([
                'position_id'=> $position->id,
                'applicant_id'=> Auth::id(),
                'resume'=> $path,
            ]);

            return back()->with('apply','Applied successfully');

            
        }
}
