<?php

namespace App\Http\Controllers;

use App\Models\SMSConf;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $conf = SMSConf::first();
        return view('admin.settings',compact('conf'));
    }
    public function update(Request $request)
    {
        $conf=SMSConf::first();
        $conf->update($request->all());
        return redirect()->back();
    }
}
