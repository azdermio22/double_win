<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UsersArticle;

class Quantity extends Component
{
    public $quantity;
    public $id;

    public function render()
    {
        return view('livewire.quantity');
    }
    function update(){
        $article = UsersArticle::all()->where('article_id',$this->id);
        foreach ($article as $article) {
            $article->update([
                'quantity' => $this->quantity,
            ]);
        }
    }

    function remove(){
        $article = UsersArticle::all()->where('article_id',$this->id);
        foreach ($article as $article) {
            $article->delete();
        }
    }
}
