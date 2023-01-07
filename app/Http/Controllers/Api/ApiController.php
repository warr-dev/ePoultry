<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DHTConf;
use App\Models\FanLogs;
use App\Models\FeedingConf;
use App\Models\HDT;
use App\Models\FeedingTime;
use App\Models\Heat;
use App\Models\LightLogs;
use App\Models\WaterConf;
use App\Models\WaterLogs;
use App\Models\TankLevels;
use App\Models\LightConf;
use App\Models\SMSConf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function feeder(Request $request)
    {
        $conf = FeedingConf::first();
        $tank=new TankLevels();
        $tank->tank='feeder';
        $tank->level = (($conf->tankheight - $request->level) / $conf->tankheight) * 100;
        if(TankLevels::isTakeTime()){
            $tank->save();
        }
        
        if ($tank->level < $conf->maintankcritical)
        {
            $sms = $this->semaphore('From: EPoult 
                The Water tank is now at Critical Level (' . $tank->level . '%). Please refill immediately');
        }
        return response()->json([
            'status' => 'success',
            'level' => $tank->level,
            'feeding' => FeedingTime::isFeedingTime()
        ]);
    }
    public function getFeedingConf()
    {
        $conf = FeedingConf::first();
        return response()->json([
            'mode' => $conf->mode,
            'height' => $conf->tankheight,
            'crit' => $conf->tankcritical,
        ]);
    }
    public function setFeedingConf(Request $request)
    {
        $conf = FeedingConf::first();
        $conf->update(array_merge($request->all(), ['mode' => 'run']));
        return response()->json([
            // 'conf' => $conf,
            'status' => 'success'
        ]);
    }
    public function checkmode()
    {
        $conf = WaterConf::first();
        return response()->json([
            'mode' => $conf->mode,
            'critical' => $conf->dispensertankheight - ($conf->dispensertankheight * ($conf->dispensertankcritical / 100)),
            'fill' => $conf->dispensertankheight - ($conf->dispensertankheight * .7)
        ]);
    }
    public function setmode(Request $request)
    {
        $conf = WaterConf::first();
        $conf->mode = $request->mode ?? 'setup';
        $conf->save();
        return response()->json([
            'conf' => $conf,
            'status' => 'success'
        ]);
    }
    public function setheight(Request $request)
    {
        $conf = WaterConf::first();
        $conf->update(array_merge($request->all(), ['mode' => 'run']));
        return response()->json([
            'status' => 'success'
        ]);
    }
    public function setlight(Request $request)
    {
        if (!$request->state)
            return response()->json(['status' => 'failed', 'message' => 'state is required']);
        LightLogs::create($request->all());
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function setfan(Request $request)
    {
        if (!$request->state)
            return response()->json(['status' => 'failed', 'message' => 'state is required']);
        FanLogs::create($request->all());
        return response()->json([
            'status' => 'success'
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
            'status' => 'success'
        ]);
    }
    public function getdhtconf()
    {
        $conf = DHTConf::first();
        return response()->json([
            'countdown' => DHTConf::countdown(),
            'tcrit' => $conf->critical_temperature,
            'hcrit' => $conf->critical_humidity
        ]);
    }
    public function setwaterlog(Request $request)
    {
        WaterLogs::create($request->all());
        return response()->json([
            'status' => 'success'
        ]);
    }
    public function settanklevel(Request $request)
    {
        $data = $request->validate([
            'tank' => ['required', 'string'],
            'level' => ['required', 'numeric']
        ]);

        if ($data['tank'] == 'main') {
            $conf = WaterConf::first();
            $data['level'] = (($conf->maintankheight - $data['level']) / $conf->maintankheight) * 100;
            if ($data['level'] < $conf->maintankcritical)
                $sms = $this->semaphore('From: EPoult 
                 The Water tank is now at Critical Level (' . $data['level'] . '%). Please refill immediately');
        }
        TankLevels::create($data);
        return response()->json([
            'status' => 'success',
            'level' => $data['level'],
        ]);
    }
    public function getlightconf()
    {
        $conf = LightConf::first();
        return response()->json([
            'value' => $conf->value,
        ]);
    }
    public function getheatstatus()
    {
        return response()->json([
            'heating' => Heat::isHeating()
        ]);
    }
    public function itexmo($number, $message)
    {
        $apicode = config('app.sms')['apicode'];
        $passwd = config('app.sms')['passwd'];
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd, '6' => config('app.sms')['sender_id']);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
    }
    public function semaphore($message)
    {
        $conf = SMSConf::first();
        $response = Http::post('https://api.semaphore.co/api/v4/messages', [
            'apikey' => $conf->apikey,
            'number' => $conf->number,
            'message' => $message
        ]);
        return $response;
    }
    public function setFeederMode(Request $request)
    {
        $conf = FeedingConf::first();
        $conf->mode = $request->mode ?? 'setup';
        $conf->save();
        return response()->json([
            // 'conf' => $conf,
            'status' => 'success'
        ]);
    }
    public function checkfeedmode()
    {
        $conf = FeedingConf::first();
        return response()->json([
            'mode' => $conf->mode,
            'critical' => $conf->tankheight - ($conf->tankheight * ($conf->tankcritical / 100)),
            'fill' => $conf->tankheight - ($conf->tankheight * .7)
        ]);
    }
    // public function setfeedertankheight(Request $request)
    // {
    //     $conf = FeedingConf::first();
    //     $conf->update(array_merge($request->all(), ['mode' => 'run']));
    //     return response()->json([
    //         'status' => 'success'
    //     ]);
    // }
}
