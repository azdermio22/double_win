<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jewels extends Model
{
    use HasFactory;

    protected $fillable = [
        'material',
        'certificate',
        'article_id',
    ];
}
