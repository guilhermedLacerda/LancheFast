<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Administrador;

class AdminShow extends Component
{
    public $admin;

    public function mount($id)
    {
        $this->admin = Administrador::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.admin-show');
    }
}
