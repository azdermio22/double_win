<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'volume',
        'displacement',
        'model',
        'brand',
        'km',
        'powering',
    ];
}
