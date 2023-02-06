<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HDT extends Model
{
    use HasFactory;

    protected $fillable = ['humidity','temperature'];

    protected $casts = [
        'created_at'=>'datetime:Y-m-d h A'
    ];
}
