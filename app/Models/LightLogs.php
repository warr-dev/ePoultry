<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LightLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'created_at'
    ];

    public static function setDummyData($start,$end){
        self::truncate();
        $start=strtotime($start);
        $end=strtotime($end);
        $curr=$start;
        while ($curr <= $end) {
            self::create([
                'state'=> 'on',
                'created_at'=>strtotime(date('Y-m-d',$curr).' '.rand(17,18).':'.rand(0,59).':'.rand(0,59))
            ]);
            self::create([
                'state'=> 'off',
                'created_at'=>strtotime(date('Y-m-d',$curr).' '.rand(5,7).':'.rand(0,59).':'.rand(0,59))
            ]);
            $curr = strtotime(date('Y-m-d', $curr) . ' +1days');
        }
    }
}
