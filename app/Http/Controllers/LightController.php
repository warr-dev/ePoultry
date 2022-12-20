<?php

namespace App\Http\Controllers;

use App\Models\LightConf;
use App\Models\LightLogs;
use Illuminate\Http\Request;

class LightController extends Controller
{
    public function index()
    {
        $lightlogs = LightLogs::orderBy('id','desc')->limit(10)->get();
        $conf=LightConf::first();
        return view('admin.light',compact('lightlogs','conf'));
    }
    public function update(Request $request)
    {
        $conf=LightConf::first();
        $conf->update($request->all());
        return redirect()->back();
    }
}
