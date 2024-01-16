<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserBuy extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id',
        'quantity',
        'user_id',
    ];

    public function article()
    {
        return $this->belongsToMany(Article::class);
    }
}
