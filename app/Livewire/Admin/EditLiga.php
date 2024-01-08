<?php

namespace App\Livewire\Admin;

use App\Http\Controllers\CloudinaryStorage;
use App\Models\Liga;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit Liga')]
#[Layout('components.layouts.guest')]

class EditLiga extends Component
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

    public $liga;

    public function mount($ligaid){
        $this->liga = Liga::find($ligaid); 
        
        $this->name = $this->liga->name;
        $this->region_id = $this->liga->region_id;
        $this->country = $this->liga->country;
    }

    public function update()
    {
        $validated = $this->validate();
        $validated['image'] = CloudinaryStorage::replace($validated['image'], $validated['image']->getRealPath(), $validated['image']->getClientOriginalName());
        try {
            $this->liga->update($validated);
            flash('Post has been updated', 'success');
        } catch (\Throwable $th) {
            flash('Failed to update a Post', 'error');
        }
    }

    public function render()
    {
        return view('livewire.pages.admin.edit-liga');
    }
}
