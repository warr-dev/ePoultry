<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankLevels extends Model
{
    use HasFactory;

    protected $fillable = ['tank','level','created_at'];


    public static function isTakeTime($tank)
    {
        $last=self::orderBy('created_at','desc')->whereRaw('date(`created_at`) = CURRENT_DATE')->where('tank',$tank)->first();
        if(!$last) return true;
        if($last->created_at->addHours(1)->format('H')<=Carbon::now()->format('H')) return true;
        return false;
    }

    public static function getLatest($tank)
    {
        return $last=self::orderBy('created_at','desc')->whereRaw('date(`created_at`) = CURRENT_DATE')->where('tank',$tank)->first();
    }
}
