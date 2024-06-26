<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LightConf extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'critical_temperature'];

    public static function isManual()
    {
        $conf=self::first();
        $latest = HDT::getLatest();
        if (!$latest) return false;
        return $latest->temperature<=$conf->critical_temperature;
    }
}
