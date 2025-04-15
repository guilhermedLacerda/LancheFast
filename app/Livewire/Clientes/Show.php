<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class Show extends Component
{
    public $cliente;

    // Monta o componente com o model Cliente passado
    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    // Renderiza a view
    public function render()
    {
        return view('livewire.clientes.show', [
            'cliente' => $this->cliente
        ]);
    }
}
