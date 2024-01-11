<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyController extends Controller
{
    function checkout(Request $request) {
        return $request->user()->checkout('price_1OXKwYBrlHeHDL7xt1EAxZD6');
    }
}
