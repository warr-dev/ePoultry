<?php

namespace App\Http\Controllers;

use App\Models\WaterConf;
use App\Models\WaterLogs;
use Illuminate\Http\Request;

class WaterController extends Controller
{
    public function index()
    {
        $conf = WaterConf::first();
        $logs = WaterLogs::orderBy('id','desc')->limit(10)->get();
        return view('admin.water',compact('conf','logs'));
    }
    
    public function setup()
    {
        if (WaterConf::getmode() !== 'setup')
            return redirect()->back();
        return view('admin.settingup');
    }

    public function update(Request $request)
    {
        $conf=WaterConf::first();
        $conf->update($request->all());
        return redirect()->back();
    }
    
}
