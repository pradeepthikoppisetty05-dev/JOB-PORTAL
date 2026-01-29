<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyApplicationController extends Controller
{
    public function index(){
     
       $applications= Application::where('applicant_id',Auth::id())
                                   ->with('position')
                                   ->latest()
                                   ->get();

        return view('applicant.applications',compact('applications'));
    }
}
