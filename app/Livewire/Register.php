<?php

namespace App\Livewire;

use App\Livewire\Forms\RegisterForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Register')]

#[Layout('components.layouts.guest')]

class Register extends Component
{

    public RegisterForm $form;

    public function register() 
    {
        $this->form->register();
    }

    public function render()
    {
        return view('livewire.pages.auth.register');
    }
}
