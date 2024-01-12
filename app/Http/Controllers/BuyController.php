<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    function checkout(Request $request, Article $article) {
        return $request->user()->checkout($article->stripe_id_price);
    }
}
