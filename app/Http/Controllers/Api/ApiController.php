<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DHTConf;
use App\Models\FanLogs;
use App\Models\HDT;
use App\Models\FeedingTime;
use App\Models\LightLogs;
use App\Models\WaterConf;
use App\Models\WaterLogs;
use App\Models\TankLevels;
use App\Models\LightConf;
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
        $conf = WaterConf::first();
        return response()->json([
            'mode'=> $conf->mode,
            'critical'=>$conf->dispensertankheight-($conf->dispensertankheight*($conf->dispensertankcritical/100)),
            'fill'=> $conf->dispensertankheight-($conf->dispensertankheight*.90)
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
        // $data = $request->validate([
        //     'humidity'=>['numeric','required'],
        //     'temperature'=>['numeric','required']
        // ]);
        HDT::create($request->all());
        return response()->json([
            'status'=>'success'
        ]);
    }
    public function getdhtconf()
    {
        $conf=DHTConf::first();
        return response()->json([
            'countdown'=> DHTConf::countdown(),
            'tcrit'=> $conf->critical_temperature,
            'hcrit'=> $conf->critical_humidity
        ]);
    }
    public function setwaterlog(Request $request)
    {
        WaterLogs::create($request->all());
        return response()->json([
            'status'=>'success'
        ]);
    }
    public function settanklevel(Request $request)
    {
        $data=$request->validate([
            'tank'=>['required','string'],
            'level'=>['required','numeric']
        ]);
        if($data['tank']=='main')
        {
            $tankh = WaterConf::first()->maintankheight;
            $data['level'] = (($tankh - $data['level']) / $tankh) * 100;
        }
        TankLevels::create($data);
        return response()->json([
            'status'=>'success'
        ]);
    }
    public function getlightconf()
    {
        $conf=LightConf::first();
        return response()->json([
            'value'=> $conf->value,
        ]);
    }
}
