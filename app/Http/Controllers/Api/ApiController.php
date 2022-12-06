<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FeedingTime;
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
}
