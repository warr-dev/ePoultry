<?php

namespace App\Http\Controllers;

use App\Models\Heat;
use Illuminate\Http\Request;

class ManureController extends Controller
{
    public function index()
    {
        $heatlogs = Heat::orderBy('id','desc')->limit(10)->get();
        return view('admin.manure',compact('heatlogs'));
    }
    public function store(Request $request)
    {
        $seconds = $request->seconds;
        $hours = floor($seconds / 3600);
        $mins = floor($seconds / 60 % 60);
        $secs = floor($seconds % 60);
        Heat::create([
            'duration'=>sprintf('%02d:%02d:%02d', $hours, $mins, $secs)
        ]);
        return redirect()->back();
    }
}
