<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Heat extends Model
{
    use HasFactory;


    protected $fillable = ['seconds'];

    public static function isHeating(){
        $heattime = self::whereRaw("'".date('Y-m-d H:i:s')."' BETWEEN `created_at` AND addtime(`created_at`,`seconds`)")
            ->first();
        if (!$heattime)
            return 1;
        return 0;
    }
}
