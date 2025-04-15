<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pedidos;

class PedidosIndex extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['deletePedido'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deletePedido($pedidoId)
    {
        $pedido = Pedidos::find($pedidoId);
        if ($pedido) {
            $pedido->delete();
            session()->flash('success', 'Pedido deletado com sucesso.');
            $this->resetPage();
        }
    }

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';

        $query = Pedidos::with('cliente')
            ->where(function ($query) use ($searchTerm) {
                $query->whereHas('produtos', function ($q) use ($searchTerm) {
                    $q->where('nome', 'like', $searchTerm);
                })
                ->orWhereHas('cliente', function ($q) use ($searchTerm) {
                    $q->where('nome', 'like', $searchTerm);
                })
                ->orWhere('status', 'like', $searchTerm);
            });

        $pedidos = $query->orderBy('data_hora_pedido', 'desc')->paginate(10);

        return view('livewire.pedidos.pedidos-index', [
            'pedidos' => $pedidos,
        ]);
    }
}
