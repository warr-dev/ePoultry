<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterConf extends Model
{
    use HasFactory;

    protected $fillable = [
        'mode',
        'maintankheight',
        'maintankcritical',
        'waterercritical',
        'waterer0',
        'waterer100'
    ];

    public static function getmode()
    {
        return WaterConf::first()->mode;
    }
    public static function getWatererCritical()
    {
        $conf=self::first();
        $a = $conf->waterer100 - $conf->waterer0;
        $b = $a * ($conf->waterercritical / 100);
        $b = $b + $conf->waterer0;
        return $b;
    }
    public static function setLevel($level)
    {
        $conf=self::first();
        $a = $conf->waterer100 - $conf->waterer0;
        $b = (($level-$conf->waterer0) / $a) * 100;
        return $b;
    }

    public static function setTankLevel($level)
    {
        $conf=self::first();
        return (($conf->maintankheight - $level) / $conf->maintankheight) * 100;
    }
}
