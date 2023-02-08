<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FanLogs extends Model
{
    use HasFactory;
    protected $fillable = [
        'state',
        'created_at'
    ];
}
