<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HDT extends Model
{
    use HasFactory;

    protected $fillable = ['humidity','temperature','created_at'];

    protected $casts = [
        'created_at'=>'datetime:Y-m-d h A'
    ];

    public static function setDummyData($start,$end){
        $conf=DHTConf::first();
        self::truncate();
        FanLogs::truncate();
        $start=strtotime($start.' +10hours +'.rand(0,59).'minutes');
        $end=strtotime($end);
        $curr=$start;
        while ($curr <= $end) {
            $time = date('Y-m-d H:i:s', $curr).' +1hours';
            $curr = strtotime($time);
            $d=self::create([
                'humidity'=>rand(30,40),
                'temperature'=>rand(25,32),
                'created_at'=>$curr
            ]);
            $state=$d->temperature>=$conf->critical_temperature?'on':'off';
            FanLogs::create([
                'state'=>$state,
                'created_at'=>$curr
            ]);
        }
    }
    public static function getLatest()
    {
        // return self::latest('created_at')->first();
        return self::whereRaw("'".Carbon::now()->format('Y-m-d H:i:s')."' BETWEEN `created_at` AND addtime(`created_at`,'01:00:00')")
            ->first();
    }
}
