<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Article;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Article $article)
    {
        return view('article_detail',compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoris = Categori::all();
        return view('vendi',compact('categoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = Article::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'categori_id' => $request->category,
            'user_id' => Auth::user()->id,
        ]);
        foreach ($request->image as $image) {
            Image::create([
                'images' => $image->store('public/img'),
                'article_id' => $article->id,
            ]);
        }
        return redirect (route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
