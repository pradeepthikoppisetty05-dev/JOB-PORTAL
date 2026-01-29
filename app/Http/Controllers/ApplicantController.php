<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function index(Request $request){
        $positions=Position::latest()->get();
        return view('applicant.dashboard', compact('positions'));
    }

    public function show(Position $position){

        return view('applicant.show',compact('position',));
    }
}
