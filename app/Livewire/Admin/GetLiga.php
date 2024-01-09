<?php

namespace App\Livewire\Admin;

use App\Http\Controllers\CloudinaryStorage;
use App\Models\Liga;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Lihat Produk')]

#[Layout('components.layouts.guest')]

class GetLiga extends Component
{
    use WithPagination; 

    #[Url()]
    public $search = '';

    public $ligaid;

    public function check($id)
    {
        $this->ligaid = $id;
    }

    public function destroy()
    {
        $liga = Liga::find($this->ligaid);
        CloudinaryStorage::delete($liga->image);
        $liga->delete();
    }
    
    public function render()
    {
        $ligas = Liga::where('name', 'like', "%{$this->search}%")->paginate(8);
        return view('livewire.pages.admin.get-liga', [
            'ligas' => $ligas,
        ]);
    }
}
