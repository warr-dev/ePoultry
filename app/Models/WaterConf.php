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
        'dispensertankheight',
        'maintankcritical',
        'dispensertankcritical'
    ];

    public static function getmode()
    {
        return WaterConf::first()->mode;
    }
}
