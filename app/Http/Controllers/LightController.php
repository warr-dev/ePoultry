<?php

namespace App\Http\Controllers;

use App\Models\LightLogs;
use Illuminate\Http\Request;

class LightController extends Controller
{
    public function index()
    {
        $lightlogs = LightLogs::all();
        return view('admin.light',compact('lightlogs'));
    }
}
