<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    use HasFactory;

    protected $fillable=['device','isConnected'];

    public static $devices=['feeder','water','temperature','light'];
    public static function checkStat($device)
    {
        $d=self::where('device',$device)->first();
        $now=Carbon::now();
        return $now->diffInSeconds($d->updated_at)<=8;
    }
}
