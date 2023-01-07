<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankLevels extends Model
{
    use HasFactory;

    protected $fillable = ['tank','level'];


    public static function isTakeTime()
    {
        $last=self::orderBy('created_at','desc')->whereRaw('date(`created_at`) = CURRENT_DATE')->first();
        if(!$last) return true;
        if($last->created_at->addHours(1)<Carbon::now()) return true;
        return false;
    }
}
