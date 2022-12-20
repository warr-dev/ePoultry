<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeedingTime;

class FeedingController extends Controller
{
    public function index()
    {
        $feedtimes = FeedingTime::all();
        $days = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        return view('admin.feeding',compact('days','feedtimes'));
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

}
