<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersImage;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function update(Request $request){
        dd($img);
        UsersImage::create([
            'image' => $request->file('img')->store('public/img'),
            'user_id' => $user->id,
        ]);
        return redirect(route('profile',compact('user')));
    }

    function profile(User $user){
        $user_images = UsersImage::all();
        return view("profile",compact('user','user_images'));
    }
}
