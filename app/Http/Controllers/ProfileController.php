<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Article;
use App\Models\UsersImage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public $verified;
    function profile(User $user){
        $user_images = UsersImage::all();
        $articles = Article::all();
        $images = Image::all();
        return view('profile',compact('user','user_images','articles','images'));
    }
    function update(User $user, Request $request){
        $imgs = UsersImage::all();
        foreach ($imgs as $img) {
            if ($img->user_id == $user->id) {
                $this->verified = $img;
            }
        }
        if ($request->img) {
            if ($this->verified == "") {
                UsersImage::create([
                    'image' => $request->file("img")->store('public/img'),
                    'user_id' => $user->id,
                ]);
            }else{
                $this->verified->update([
                    'image' => $request->file("img")->store('public/img'),
                ]);
            }
        }
        $user->update([
            'name' => $request->name,
            'suname' => $request->surname,
            'country' => $request->country,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect(route('profile',compact('user')));
    }
}
