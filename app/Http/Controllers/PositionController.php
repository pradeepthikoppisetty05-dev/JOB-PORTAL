<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PositionController extends Controller
{
    public function index(Request $request){
        $positions= Position::where('employer_id', Auth::id())->get();
        return view('employer.dashboard', compact('positions'));
    }

    public function create(){
        return view('employer.create');
    }

    public function store(Request $request){
        $incomingData=$request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'location'=>'required|string|max:255',
            'salary'=>'nullable|string|max:255',
        ]);
        Position::create([
            'employer_id'=>Auth::id(),
            'title'=>$incomingData['title'],
            'description'=>$incomingData['description'],
            'location'=>$incomingData['location'],
            'salary'=>$incomingData['salary'] ?? null,
        ]);
        return redirect()->route('employer.dashboard')->with('position','Position created successfully');
    }

    public function edit(Position $position){
        
        return view('employer.edit', compact('position'));
    }

    public function update(Request $request, Position $position){
       
        $incomingData=$request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'location'=>'required|string|max:255',
            'salary'=>'nullable|string|max:255',
        ]);
        $position->update($incomingData);
        return redirect()->route('employer.dashboard')->with('edit','Position updated successfully');
    }

    public function destroy(Position $position){
        $position->delete();
        return redirect()->route('employer.dashboard')->with('delete','position deleted successfully');
    }
}
