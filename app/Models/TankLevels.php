<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankLevels extends Model
{
    use HasFactory;

    protected $fillable = ['tank','level'];
}
