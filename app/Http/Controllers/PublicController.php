<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function home() {
        $articles = Article::all();
        return view('welcome',compact('articles'));
    }
}
