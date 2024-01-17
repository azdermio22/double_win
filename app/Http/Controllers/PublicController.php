<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Image;
use App\Mail\password;
use App\Models\Article;
use App\Models\UserBuy;
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
            $create = 0;
            $user_time = UserTime::all()->where('user_id', Auth::user()->id);
            $user_time_index = [];
            if (count($user_time) > 0) {
                foreach ($user_time as $time) {
                    array_push($user_time_index, $time);
                }
                for ($i=0; $i < count($user_time); $i++) { 
                    if ($user_time_index[$i]->last_logout != null) {
                        $create = 1;
                    }else{
                        $create = 0;
                        $i = count($user_time_index);
                    }
                }
                if ($create == 1) {
                    UserTime::create([
                        'user_id' => Auth::user()->id,
                        'last_login' => Carbon::now('CET'),
                        'last_logout' => null,
                    ]);
                }
            }else{
                UserTime::create([
                    'user_id' => Auth::user()->id,
                    'last_login' => Carbon::now('CET'),
                    'last_logout' => null,
                ]);
            }
        }
        return view('welcome',compact('articles','images','profile'));
    }
    function dashboard(){
        $profile = 0;
        if (Auth::user()) {
            $profile = UsersImage::find(Auth::user()->id);
        }
        $users = User::all();
        $user_time = UserTime::all()->sortByDesc('id');
        $user_image = UsersImage::all();
        $user_buys = UserBuy::all();
        $articles = Article::all();
        return view('dashboard',compact('profile','users','user_time','user_image','user_buys','articles'));
    }
    function logout(){
        return redirect(route('logout'));
    }
}
