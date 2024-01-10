<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'article_id',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
