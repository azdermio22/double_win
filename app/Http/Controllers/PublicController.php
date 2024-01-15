<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Image;
use App\Mail\password;
use App\Models\Article;
use App\Models\UserTime;
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

                $prova = UserTime::create([
                    'last_login' => Carbon::now('CET'),
                    'last_logout' => null,
                    'user_id' => Auth::user()->id,
                ]);

        }
        return view('welcome',compact('articles','images','profile'));
    }
    function dashboard(){
        $profile = 0;
        if (Auth::user()) {
            $profile = UsersImage::find(Auth::user()->id);
        }
        $users = User::all();
        $user_time = UserTime::all();
        return view('dashboard',compact('profile','users','user_time'));
    }
    function logout(){
        return redirect(route('logout'));
    }
}
