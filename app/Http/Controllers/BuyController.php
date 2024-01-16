<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\UserBuy;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    function checkout(Request $request, Article $article) {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $stripe->paymentIntents->create([
          'amount' => 1099,
          'currency' => 'eur',
          'payment_method_types' => ['card'],
          'description' => 'Thanks for your purchase!',
          'receipt_email' => 'christian.conti123@gmail.com',
        ]);
        return $request->user()->checkout($article->stripe_id_price,[
            'success_url' => route('chekout_sucess',compact('article')),
            'cancel_url' => route('chekout_error'),
        ]);
    }
    function checkout_sucess($article){
        $bought = UserBuy::create([
            'article_id' => $article,
            'user_id' => Auth::user()->id,
            'quantity' => 1,
        ]);
        return redirect(route('home'));
    }
    function checkout_error(){
    }
}
