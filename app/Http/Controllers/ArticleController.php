<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Image;
use App\Models\jewels;
use App\Models\Veicle;
use App\Models\Article;
use App\Models\Clothes;
use App\Models\Categori;
use Stripe\StripeClient;
use App\Models\UsersImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $stripe = new StripeClient(env("STRIPE_SECRET"));
        $product = $stripe->products->create([
            'name' => $request->name,
            'description' => $request->description,
            'default_price_data' => [
                'currency' => 'eur',
                'unit_amount' => $request->price * 100,
            ],
            'images' => [],
        ]);

        $article = Article::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'categori_id' => $request->category,
            'user_id' => Auth::user()->id,
            'stripe_id' => $product->id,
            'stripe_id_price' => $product->default_price,
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
        $profile = 0;
        if (Auth::user()) {
            $profile = UsersImage::find(Auth::user()->id);
        }
        return view('update',compact('article','categoris','profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));

        $price = $stripe->prices->create([
            'product' => $article->stripe_id,
            'unit_amount' => $request->price * 100,
            'currency' => 'usd',
        ]);
        $stripe->products->update(
            $article->stripe_id,
            [
                'name' => $request->name,
                'description' => $request->description,
                'default_price' => $price->id,

            ],
);

$stripe->prices->update(
  $article->stripe_id_price,
  [
    'active' => false,
  ]
);



        $article->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'categori' => $request->categori,
            'image' => $request->name,
            'stripe_id_price' => $price->id,
        ]);

        if ($request->category == 1) {
            foreach (Clothes::all()->where('article_id', $article->id) as $info) {
                $info->update([
                    'size' => $request->size,
                    'brand' => $request->brand,
                    'article_id' => $article->id,
                ]);
            }
        }else if ($request->category == 2) {
            foreach (Veicle::all()->where('article_id', $article->id) as $info) {
               $info->update([
                    'volume' => $request->volume,
                    'displacement' => $request->displacement,
                    'model' => $request->model,
                    'brand' => $request->brand,
                    'km' => $request->km,
                    'powering' => $request->powering,
                    'article_id' => $article->id,
                ]); 
            }
        }else if ($request->category == 3) {
            foreach (jewels::all()->where('article_id', $article->id) as $info) {
                $info->update([
                    'material' => $request->material,
                    'certificate' => $request->certificate,
                    'article_id' => $article->id,
                ]);
            }
        }

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
        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $stripe = new \Stripe\StripeClient(env("STRIPE_SECRET"));
        $stripe->products->update(
            $article->stripe_id,
            [
                'active' => false,
            ],
);

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
