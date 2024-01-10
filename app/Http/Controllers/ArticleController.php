<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\jewels;
use App\Models\Veicle;
use App\Models\Article;
use App\Models\Clothes;
use App\Models\Categori;
use App\Models\UsersImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Article $article)
    {
        $profile = 0;
        if (Auth::user()) {
            $profile = UsersImage::find(Auth::user()->id);
        }
        switch ($article->categori_id) {
            case '1':
                $more_info = Clothes::all()->where('article_id',$article->id);
                break;
            case '2':
                $more_info = Veicle::all()->where('article_id',$article->id);
                break;
            case '3':
                $more_info = jewels::all()->where('article_id',$article->id);
                break;
        }
        return view('article_detail',compact('article','profile','more_info'));
    }

    public function profile_detail(Article $article)
    {
        $var = 0;
        return view('article_detail',compact('article','var'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoris = Categori::all();
        if (Auth::user()) {
            $profile = UsersImage::find(Auth::user()->id);
        }
        return view('vendi',compact('categoris','profile'));
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
        if ($request->category == 1) {
            $more_info = Clothes::create([
                'size' => $request->size,
                'brand' => $request->brand,
                'article_id' => $article->id,
            ]);
        }else if ($request->category == 2) {
            $more_info = Veicle::create([
                'volume' => $request->volume,
                'displacement' => $request->displacement,
                'model' => $request->model,
                'brand' => $request->brand,
                'km' => $request->km,
                'powering' => $request->powering,
                'article_id' => $article->id,
            ]); 
        }else if ($request->category == 3) {
            $more_info = jewels::create([
                'material' => $request->material,
                'certificate' => $request->certificate,
                'article_id' => $article->id,
            ]);
        }
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
        $categoris = Categori::all();
        return view('update',compact('article','categoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'categori' => $request->categori,
            'image' => $request->name,
        ]);
        $prova = Image::where('article_id', $article->id)->get();
        foreach ($prova as $prov) {
            $prov->delete();
        }
        foreach ($request->image as $image) {
            Image::create([
                'images' => $image->store('public/img'),
                'article_id' => $article->id,
            ]);
        }
        return redirect(route('profile'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $images = Image::all();
        foreach ($images as $image) {
            if ($image->article_id == $article->id) {
                $image->delete();
            }
        }
        $article->delete();
        return redirect(route('home'));
    }
}
