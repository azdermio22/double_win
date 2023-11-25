<?php

namespace App\Livewire;

use Livewire\Component;

class Form extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function register(){
        dd($this->name);
    }

    public function render()
    {
        return view('livewire.form');
    }
}
