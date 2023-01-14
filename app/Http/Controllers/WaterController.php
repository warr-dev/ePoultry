<?php

namespace App\Http\Controllers;

use App\Models\TankLevels;
use App\Models\WaterConf;
use App\Models\WaterLogs;
use Illuminate\Http\Request;

class WaterController extends Controller
{
    public function index()
    {
        $conf = WaterConf::first();
        $conf->mode='run';
        $conf->save();
        $logs = WaterLogs::orderBy('id','desc')->limit(10)->get();
        $watererLevels = TankLevels::where('tank', 'waterer')->orderBy('id','desc')->limit(10)->get();
        $tankLevels = TankLevels::where('tank', 'main')->orderBy('id','desc')->limit(10)->get();
        $latest = TankLevels::getLatest('waterer');
        return view('admin.water',compact('conf','logs','latest','watererLevels','tankLevels'));
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
    public function calibrate()
    {
        $conf = WaterConf::first();
        if (WaterConf::getmode() !== 'calibrate')
            return redirect()->back();
        return view('admin.watercalibrate',compact('conf'));
    }
    
}
