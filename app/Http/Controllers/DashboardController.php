<?php

namespace App\Http\Controllers;

use App\Models\FeedingTime;
use Illuminate\Http\Request;
use App\Models\HDT;
use App\Models\TankLevels;

class DashboardController extends Controller
{
    public function index()
    {
        $lastdht = HDT::orderBy('id', 'desc')->first();
        $waterlevel = TankLevels::where('tank', 'main')->orderBy('id', 'desc')->first()->level;
        $refills = TankLevels::where('tank', 'main')->whereRaw('date(created_at)=' . date('Y-m-d'))->count();
        $feedingcounts = FeedingTime::countFeedingToday();
        $feedingdone = FeedingTime::feedingDoneToday();
        $dhtvalues = HDT::all();
        return view('admin.dashboard',compact('lastdht','waterlevel','refills','feedingcounts','feedingdone','dhtvalues'));
    }
}
