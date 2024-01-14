<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Stripe\StripeClient;
use Illuminate\Http\Request;

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
            'success_url' => route('chekout_sucess'),
            'cancel_url' => route('chekout_error'),
        ]);
    }
    function checkout_sucess(){
        return redirect(route('home'));
    }
    function checkout_error(){
        dd('error');
    }
}
