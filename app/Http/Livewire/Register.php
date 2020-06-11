<?php

namespace App\Http\Livewire;

use App\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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
            'form.email' => 'required|email|unique:users,email',
            'form.name' => 'required|max:255',
            'form.password' => 'required|confirmed'
        ]);

        User::create($this->form);
        
        Auth::attempt($this->form);
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
