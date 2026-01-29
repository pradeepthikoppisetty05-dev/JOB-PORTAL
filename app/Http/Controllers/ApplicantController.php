<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index(Request $request){
        $positions=Position::latest()->get();
        return view('applicant.dashboard', compact('positions'));
    }

    public function show(Position $position){
        //$positions=Position::get();
        return view('applicant.show',compact('position'));
    }
}
