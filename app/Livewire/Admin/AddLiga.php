<?php

namespace App\Livewire\Admin;

use App\Http\Controllers\CloudinaryStorage;
use App\Models\Liga;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Tambah Liga')]
#[Layout('components.layouts.guest')]

class AddLiga extends Component
{

    use WithFileUploads;

    #[Validate('required')]
    public $name = '';

    #[Validate('numeric')]
    public $region_id = '1';

    #[Validate('required', 'string')]
    public $country = '';

    #[Validate('required', 'image', 'mimes:jpeg,jpg,png', 'max:1024')]
    public $image;

    public function save()
    {
        $validated = $this->validate();
        $validated['image'] = CloudinaryStorage::upload($validated['image']->getRealPath(), $validated['image']->getClientOriginalName());
        try {
            Liga::create($validated);
            flash('Post created successfully', 'success');
            $this->reset();
        } catch (\Throwable $th) {
            flash('Failed to make a Post', 'error');
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.add-liga');
    }
}
