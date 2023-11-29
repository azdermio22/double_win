<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersImage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function profile(User $user){
        $user_images = UsersImage::all();
        return view('profile',compact('user','user_images'));
    }
    function update(USer $user){
        dd($user);
        UsersImage::create([
            'image' => $request->image,
            'user_id' => $user->id,
        ]);
    }
}
