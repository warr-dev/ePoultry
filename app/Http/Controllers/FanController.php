<?php

namespace App\Http\Controllers;

use App\Models\DHTConf;
use App\Models\FanLogs;
use Illuminate\Http\Request;

class FanController extends Controller
{
    public function index()
    {
        $fanlogs = FanLogs::all();
        $conf = DHTConf::first();
        return view('admin.fan',compact('fanlogs','conf'));
    }

    public function setFanConf(Request $request)
    {
        $conf = DHTConf::first();
        $conf->update($request->all());
        return redirect()->back()->with('message', 'DTH configuration was updated')->with('status','success');
    }
}
