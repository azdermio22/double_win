<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UsersArticle;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{
    public $id;

    public function render()
    {
        return view('livewire.add-to-cart');
    }

    function add_to_cart(){
        UsersArticle::create([
            'user_id' => Auth::user()->id,
            'article_id' => $this->id,
            'quantity' => 1,
        ]);
    }
}
