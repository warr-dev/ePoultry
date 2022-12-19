<?php

namespace App\Http\Controllers;

use App\Models\Heat;
use Illuminate\Http\Request;

class ManureController extends Controller
{
    public function index()
    {
        $heatlogs = Heat::all();
        return view('admin.manure',compact('heatlogs'));
    }
    public function store(Request $request)
    {
        Heat::create($request->all());
        return redirect()->back();
    }
}
