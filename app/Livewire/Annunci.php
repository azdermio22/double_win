<?php

namespace App\Livewire;

use App\Models\Image;
use App\Models\Article;
use Livewire\Component;
use Illuminate\Http\Request;

class Annunci extends Component
{
    public $serch;
    public $range;
    public $categori;
    public $order;
    public $orderby;
    public $selected_filter;
    public $min;
    public $max;
    public $articles;
    public $images;
    public $prova;
    function annunci() {
        if ($this->prova) {
            dd($this->prova);
        }
        $articles = Article::all();
        $min = $articles->min('price');
        $max = $articles->max('price');
        $categori = 0;
        $filtered = [];
        if ($this->serch) {
            foreach ($articles as $article) {
                if (str_contains($article->name, $this->serch)) {
                    array_push($filtered, $article);
                }
            }
        }else{
            foreach ($articles as $article) {
                    array_push($filtered, $article);
            }
        }
        if ($this->categori) {
            foreach ($filtered as $key => $article) {
                if ($article->categori_id != $this->categori) {
                    unset($filtered[$key]);
                }
            }
            switch ($this->categori) {
                case '1':
                    $categori = "abbigliamento";
                    break;
                case '2':
                    $categori = "veicoli";
                    break;
                case '3':
                    $categori = "gioglielli";
                    break;
            }
        }
        if ($this->range) {
            foreach ($filtered as $key => $article) {
                if ($article->price > $this->range.".0") {
                    unset($filtered[$key]);
                }
            }
        }
        $fil = [['price' => 0]];
        if ($this->orderby == 0) {
            $orderby = "prezzo";
            foreach ($filtered as $article) {
                if ($article->price >= $fil[0]['price']) {
                    array_unshift($fil, $article);
                }else{
                    foreach ($fil as $key => $fi) {
                        if ($fi['price'] < $article->price) {
                            array_splice($fil,$key,0,compact('article'));
                        }
                    }
                }
            }
            array_pop($fil);
            if ($this->order) {
                $fil = array_reverse($fil);
                $order = "crescente";
            }else{
                $order = "decrescente";
            }
        }else{
            $fil = [];
            $orderby = "data";
            foreach ($filtered as $article) {
                $data = $article->created_at->day + $article->created_at->month + $article->created_at->year;
                if (sizeof($fil) == 0) {
                    $fil_data = 0;
                }else{      
                    $fil_data = $fil[0]->created_at->day + $fil[0]->created_at->month + $fil[0]->created_at->year;
                }
                if ($data >= $fil_data) {
                   array_unshift($fil, $article);
                }else{
                    foreach ($fil as $key => $fi) {
                        if ($fi['price'] < $article->price) {
                            array_splice($fil,$key,0,compact('article'));
                        }
                    }
                }
            }
            if ($this->order) {
                $fil = array_reverse($fil);
                $order = "crescente";
            }else{
                $order = "decrescente";
            }
        }             
            $this->articles = $fil;
        $images = Image::all();
        $selected_filter = [$this->serch, $this->range, $order, $categori, $orderby, $this->order, $this->categori, $this->orderby];
        $this->selected_filter = $selected_filter;
        return view('annunci',compact('articles','images','max','min','selected_filter'));
    }
}