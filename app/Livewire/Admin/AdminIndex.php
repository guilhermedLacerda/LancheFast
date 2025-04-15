<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Administrador;

class AdminIndex extends Component
{
    public $search = '';

    public function render()
    {
        $admins = Administrador::where(function ($query) {
                $query->where('nome', 'like', '%' . $this->search . '%')
                    ->orWhere('cpf', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orderBy('nome')
            ->paginate(10);

        return view('livewire.admin.admin-index', [
            'admins' => $admins,
        ]);
    }

    public function delete($id)
    {
        $admin = Administrador::findOrFail($id);
        $admin->delete();

        session()->flash('success', 'Administrador excluído com sucesso!');
    }
}
