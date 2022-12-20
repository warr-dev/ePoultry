<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedingTime extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'time',
        'days',
        'duration',
        'isActive'
    ];
    protected $casts = [
        'days' => 'array'
    ];

    public static function isFeedingTime(){
        $feedtime = self::whereRaw("'".date('H:i:s')."' BETWEEN `time` AND addtime(`time`,`duration`*60)")
            ->whereRaw('JSON_CONTAINS(days, \'["'.date('w').'"]\')')
            ->first();
        if (!$feedtime)
            return 1;
        return 0;
    }
    public static function countFeedingToday()
    {
        return self::whereRaw('JSON_CONTAINS(days, \'["'.date('w').'"]\')')
            ->count();
    }
    public static function feedingDoneToday()
    {
        return self::whereRaw('JSON_CONTAINS(days, \'["'.date('w').'"]\')')
            ->whereRaw("addtime(`time`,`duration`*60) < '".date('H:i:s'."'"))
            ->count();
    }
}

