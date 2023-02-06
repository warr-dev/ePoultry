<?php

namespace App\Http\Controllers;

use App\Models\FanLogs;
use App\Models\FeedingTime;
use Illuminate\Http\Request;
use App\Models\HDT;
use App\Models\LightLogs;
use App\Models\TankLevels;

class DashboardController extends Controller
{
    public function index()
    {
        $lastdht = HDT::orderBy('id', 'desc')->first();
        $waterlevel = TankLevels::where('tank', 'main')->orderBy('id', 'desc')->first()->level??0;
        $feederlevel = TankLevels::where('tank', 'feeder')->orderBy('id', 'desc')->first()->level??0;
        $watererlevel = TankLevels::where('tank', 'waterer')->orderBy('id', 'desc')->first()->level??0;
        $refills = TankLevels::where('tank', 'main')->whereRaw('date(created_at)=' . date('Y-m-d'))->count();
        $lastrefill=TankLevels::where('tank', 'main')->whereRaw('date(created_at)=' . date('Y-m-d'))->orderBy('id','desc')->first();
        $feedingcounts = FeedingTime::countFeedingToday();
        $feedingdone = FeedingTime::feedingDoneToday();
        $dhtvalues = HDT::limit(10)->orderBy('id','desc')->get(['temperature','humidity','created_at'])->toArray();
        
        $states = [
            'light'=> LightLogs::orderBy('id', 'desc')->first()->state??'off',
            'fan' => FanLogs::orderBy('id', 'desc')->first()->state??'off',
        ];
        return view('admin.dashboard',
            compact(
                'lastdht',
                'waterlevel',
                'refills',
                'feedingcounts',
                'feedingdone',
                'dhtvalues',
                'feederlevel',
                'lastrefill',
                'watererlevel',
                'states'
            ));
    }
}
