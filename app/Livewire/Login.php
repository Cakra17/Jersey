<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]

#[Layout('components.layouts.guest')]

class Login extends Component
{

    public LoginForm $form;

    public function login()
    {
        $this->form->login();
    }


    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
