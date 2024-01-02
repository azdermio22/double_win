<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Article;
use App\Models\UsersImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    function home() {
        $articles = Article::all();
        $images = Image::all();
        if (Auth::user()) {
            $profile = UsersImage::find(Auth::user()->id);
        }
        return view('welcome',compact('articles','images','profile'));
    }
}
