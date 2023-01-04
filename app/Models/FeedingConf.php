<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedingConf extends Model
{
    use HasFactory;

    protected $fillable = ['tankheight','tankcritical','mode'];

    public static function getmode()
    {
        return self::first()->mode;
    }
}
