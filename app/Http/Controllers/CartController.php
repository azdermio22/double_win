<?php

namespace App\Http\Controllers;

use App\Models\UsersArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function add_to_cart(Request $request){
        UsersArticle::create([
            'user_id' => Auth::user()->id,
            'article_id' => $request->article,
        ]);
    }
}
