<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Register extends Component
{
    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => ''
    ];

    public function submit(){
        $this->validate([
            'form.email' => 'required|email|unique:user,email',
            'form.name' => 'required|max:255',
            'form.password' => 'required|confirmed'
        ]);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
