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

    function annunci(Request $request) {
        $articles = Article::all();
        $min = $articles->min('price');
        $max = $articles->max('price');
        $filtered = [];
        if ($request->serch && $request->serch != "") {
            foreach ($articles as $article) {
                if (str_contains($article->name, $request->serch)) {
                    array_push($filtered, $article);
                }
            }
        }else{
            foreach ($articles as $article) {
                    array_push($filtered, $article);
            }
        }
        if ($request->categori && $request->categori != "") {
            foreach ($filtered as $key => $article) {
                if ($article->categori_id != $request->categori) {
                    unset($filtered[$key]);
                }
            }
        }
        if ($request->range && $request->range != "") {
            foreach ($filtered as $key => $article) {
                if ($article->price != $request->range.".0") {
                    unset($filtered[$key]);
                }
            }
    }
    if (sizeof($filtered) > 0) {
        $articles = $filtered;
    }
        $images = Image::all();
        return view('annunci',compact('articles','images','max','min'));
    }
}
