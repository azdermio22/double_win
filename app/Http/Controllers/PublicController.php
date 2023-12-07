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
        if ($request->serch) {
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
        if ($request->categori) {
            foreach ($filtered as $key => $article) {
                if ($article->categori_id != $request->categori) {
                    unset($filtered[$key]);
                }
            }
        }
        if ($request->range) {
            foreach ($filtered as $key => $article) {
                if ($article->price > $request->range.".0") {
                    unset($filtered[$key]);
                }
            }
    }
        $fil = [['price' => 0]];
        if ($request->orderby == 0) {
            foreach ($filtered as $article) {
                if ($article->price >= $fil[0]['price']) {
                   array_unshift($fil, $article);
                }else{
                    foreach ($fil as $key => $fi) {
                        if ($fi['price'] < $article->price) {
                            array_splice($fil,$key,0,compact('article'));
                        }
                    }
                }
            }
            array_pop($fil);
            if ($request->order) {
                $fil = array_reverse($fil);
            }
        }else{
            foreach ($filtered as $article) {
                $data = $article->created_at->day + $article->created_at->month + $article->created_at->year;
                if ($data >= $fil[0]['price']) {
                   array_unshift($fil, $article);
                }else{
                    foreach ($fil as $key => $fi) {
                        if ($fi['price'] < $article->price) {
                            array_splice($fil,$key,0,compact('article'));
                        }
                    }
                }
            }
            array_pop($fil);
            if ($request->order) {
                $fil = array_reverse($fil);
            }  
        }             
            $articles = $fil;
        $images = Image::all();
        return view('annunci',compact('articles','images','max','min'));
    }
}
