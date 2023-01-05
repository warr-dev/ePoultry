<?php

namespace App\Http\Controllers;

use App\Models\FeedingConf;
use Illuminate\Http\Request;
use App\Models\FeedingTime;

class FeedingController extends Controller
{
    public function index()
    {
        $feedtimes = FeedingTime::orderBy('id','desc')->limit(10)->get();
        $days = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        $conf = FeedingConf::first();
        return view('admin.feeding',compact('days','feedtimes','conf'));
    }
    public function create(Request $request)
    {
        $data = $request->validate([
            'time'=>['required','date_format:H:i'],
            'days.*'=>['required'],
            'duration'=>['numeric','required']
        ]);
        if (!isset($data['days']))
            return redirect()->back()->with('message', 'days was required');
        FeedingTime::create($data);
        return redirect()->back()->with('message', 'Feeding Time Added!')->with('color','green');
    }
    public function destroy(FeedingTime $id)
    {
        $id->delete();
        return redirect()->back()->with('message', 'Feeding Time Deleted!')->with('color','green');
    }

    public function update(Request $request)
    {
        $conf = FeedingConf::first();
        $conf->update($request->all());
        return redirect()->back()->with('message', 'Feeding Tank Height Updated!')->with('color', 'green');
    }
    public function setup()
    {
        if (FeedingConf::getmode() !== 'setup')
            return redirect()->back();
        return view('admin.settingupfeedtank');
    }
    public function setmode()
    {
        return view('admin.settingupfeedtank');
    }
    
}
