<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class profile extends Model
{
    use HasFactory;

    use HasApiTokens;

    protected $hidden = [
        'password'
    ];
}
