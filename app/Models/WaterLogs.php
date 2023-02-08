<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'tank',
        'created_at'
    ];

    public static function setDummyData($start,$end)
    {
        self::truncate();
        TankLevels::truncate();
        $curlevel = 89.00;
        $start=strtotime($start);
        $end=strtotime($end);
        $curr=$start;
        while($curr<=$end){
            for($i=1;$i<=rand(2,5);$i++){
                $times=rand(3,6);
                $time = date('Y-m-d H:', $curr) . rand(10, 59) . ':' . rand(10, 59) . ' +' . $times . 'hours';
                $curr = strtotime($time);
                TankLevels::create([
                    'tank'=>'waterer',
                    'level'=>rand(10,30),
                    'created_at'=> $curr
                ]);
                $curlevel-=rand(5,9)+(rand(0,99)/100);
                if($curlevel<10) $curlevel=89.00;
                TankLevels::create([
                    'tank'=>'main',
                    'level'=>$curlevel,
                    'created_at'=> $curr
                ]);
                
                self::create([
                    'tank'=>'waterer',
                    'created_at'=> $curr
                ]);
                $i++;
            }
            $curr = strtotime(date('Y-m-d', $curr) . ' +1days');
        }
        
    }
}
