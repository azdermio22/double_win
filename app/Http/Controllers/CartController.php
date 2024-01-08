<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Article;
use App\Models\UsersImage;
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

    function cart(){
        $profile = 0;
        if (Auth::user()) {
            $profile = UsersImage::find(Auth::user()->id);
        }
        $user_articles = UsersArticle::all()->where('user_id', Auth::user()->id);
        $articles = [];
        $images = [];
        foreach ($user_articles as $user_article) {
            array_push($articles, Article::find($user_article->article_id));
            array_push($images, Image::all()->where('article_id',$user_article->article_id));
        }
        return view('cart',compact('profile','articles','images'));
    }
}
