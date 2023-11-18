<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categori extends Model
{
    use HasFactory;

    protected $fillable = [
        'categori',
    ];

    public function articles(): HasMany{
        return $this->asMany(Article::class);
    }
}
