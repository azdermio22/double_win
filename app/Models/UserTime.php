<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_login',
        'last_logout',
        'user_id',
    ];
}
