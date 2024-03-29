<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Veicle;
use App\Models\UserBuy;
use App\Models\Categori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'categori_id',
        'user_id',
        'stripe_id',
        'stripe_id_price',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function categori(): BelongsTo
    {
        return $this->belongsTo(Categori::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }

    public function veicle(): BelongsTo
    {
        return $this->belongsTo(Veicle::class);
    }

    public function userbuy()
    {
        return $this->belongsToMany(UserBuy::class);
    }
}
