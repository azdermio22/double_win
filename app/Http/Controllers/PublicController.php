<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function home() {
        $articles = Article::all();
        $images = Image::all();
        return view('welcome',compact('articles','images'));
    }
}
