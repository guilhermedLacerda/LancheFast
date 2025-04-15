<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use App\Models\Pedidos;

class PedidosShow extends Component
{
    public $pedido;

    public function mount($pedido)
    {
        $this->pedido = Pedidos::with('cliente', 'produtos')->findOrFail($pedido);
    }

    public function render()
    {
        return view('livewire.pedidos.pedidos-show');
    }
}
