<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Mail\password;
use App\Models\Article;
use App\Models\UsersImage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
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
    function dashboard(){
        return view('dashboard');
    }
}
