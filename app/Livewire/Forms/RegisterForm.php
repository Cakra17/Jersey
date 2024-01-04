<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate(['required', 'string', 'min:5', 'max:30'])]
    public $name = '';

    #[Validate(['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class])]
    public $email = '';

    #[Validate(['required', 'min:8', 'max:20'])]
    public $password = '';
    
    #[Validate('string')]
    public $role = 'pelanggan';

    public function register()
    {
        $validated = $this->validate();
        $validated['password'] = Hash::make($validated['password']);
        event(new Registered(User::create($validated)));
        return redirect()->to('/login');
    }
}
