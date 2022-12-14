<?php

namespace App\Http\Controllers;

use App\Models\FanLogs;
use Illuminate\Http\Request;

class FanController extends Controller
{
    public function index()
    {
        $fanlogs = FanLogs::all();
        return view('admin.fan',compact('fanlogs'));
    }
}
