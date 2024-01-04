<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate(['required', 'email'])]
    public $email = '';

    #[Validate(['required', 'min:8', 'max:20'])]
    public $password = '';

    public function login()
    {

        if (Auth::attempt($this->validate())) {

            return redirect()->route('home');
        }
        
        flash('The provided credential do not match our records');
    }
}
