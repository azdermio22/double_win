<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Mail\password;
use App\Models\Article;
use App\Models\UsersImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    function home() {
        $articles = Article::all();
        $images = Image::all();
        $profile = 0;
        if (Auth::user()) {
            $profile = UsersImage::find(Auth::user()->id);
        }
        return view('welcome',compact('articles','images','profile'));
    }
    function password_reset(Request $request){
        $password_reset = 1;
        Mail::to($request->email)->send(new password);
        return redirect(route('register'))->with('message','prova');
    }
}
