<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DHTConf extends Model
{
    use HasFactory;

    protected $fillable = [
        'interval'
    ];

    public static function countdown()
    {
        $conf=self::first();
        return $conf->interval * 60 * 1000;
    }
}
