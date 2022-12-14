<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DHTConf;
use App\Models\FanLogs;
use App\Models\FeedingTime;
use App\Models\LightLogs;
use App\Models\WaterConf;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function check()
    {
        
        return response()->json([
            'date'=> date('Y-m-d'),
            'time'=> date('H:i:s'),
            'feeding'=>FeedingTime::isFeedingTime()
        ]);
    }
    public function checkmode()
    {
        $mode = WaterConf::first()->mode;
        return response()->json([
            'mode'=> $mode
        ]);
    }
    public function setmode(Request $request)
    {
        $conf = WaterConf::first();
        $conf->mode=$request->mode??'setup';
        $conf->save();
        return response()->json([
            'conf'=> $conf,
            'status'=>'success'
        ]);
    }
    public function setheight(Request $request)
    {
        // dd($request->all());
        $conf=WaterConf::first();
        $conf->update(array_merge($request->all(),['mode'=>'run']));
        return response()->json([
            'status'=>'success'
        ]);
    }
    public function setlight(Request $request)
    {
        if (!$request->state)
            return response()->json(['status'=>'failed','message'=>'state is required']);
        LightLogs::create($request->all());
        return response()->json([
            'status'=>'success'
        ]);
    }
    
    public function setfan(Request $request)
    {
        if (!$request->state)
            return response()->json(['status'=>'failed','message'=>'state is required']);
        FanLogs::create($request->all());
        return response()->json([
            'status'=>'success'
        ]);
    }
    public function sethdt(Request $request)
    {
        $data = $request->validate([
            'humidity'=>['numeric','required'],
            'temperature'=>['numeric','required']
        ]);
        FanLogs::create($data);
        return response()->json([
            'status'=>'success'
        ]);
    }
    public function getdhtconf()
    {
        return response()->json([
            'countdown'=> DHTConf::countdown()
        ]);
    }
}
