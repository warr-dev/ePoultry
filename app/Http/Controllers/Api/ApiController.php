<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FeedingTime;
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
}
