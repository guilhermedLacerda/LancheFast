<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use App\Models\Pedidos;
use App\Models\Cliente;
use App\Models\Produto;

class PedidosEdit extends Component
{
    public $pedido;
    public $clientes;
    public $produtos;

    public $cliente_id;
    public $forma_pagamento;
    public $status;
    public $itens = [];

    public $valor_total = 0;
    public $valor_desconto = 0;

    protected $rules = [
        'cliente_id' => 'required|exists:clientes,id',
        'forma_pagamento' => 'required|string',
        'status' => 'required|string',
        'itens' => 'required|array|min:1',
        'itens.*.quantidade' => 'required|integer|min:1',
    ];

    public function mount(Pedidos $pedido)
    {
        $this->pedido = $pedido;
        $this->clientes = Cliente::all();
        $this->produtos = Produto::all();

        $this->cliente_id = $this->pedido->cliente_id;
        $this->forma_pagamento = $this->pedido->forma_pagamento;
        $this->status = $this->pedido->status;

        foreach ($this->pedido->produtos as $produto) {
            $this->itens[$produto->id] = ['quantidade' => $produto->pivot->quantidade];
        }

        $this->calcularValores();
    }

    public function updatedItens()
    {
        $this->calcularValores();
    }

    public function calcularValores()
    {
        $total = 0;
        foreach ($this->itens as $produto_id => $item) {
            $produto = $this->produtos->find($produto_id);
            if ($produto && isset($item['quantidade'])) {
                $total += $produto->valor * $item['quantidade'];
            }
        }
        $this->valor_total = $total;
        $this->valor_desconto = 0; // Pode implementar lógica de desconto aqui
    }

    public function adicionarProduto($produto_id)
    {
        if (!isset($this->itens[$produto_id])) {
            $this->itens[$produto_id] = ['quantidade' => 1];
        }
        $this->calcularValores();
    }

    public function removerProduto($produto_id)
    {
        unset($this->itens[$produto_id]);
        $this->calcularValores();
    }

    public function salvar()
    {
        $this->validate();

        $this->pedido->update([
            'cliente_id' => $this->cliente_id,
            'valor_total' => $this->valor_total,
            'valor_desconto' => $this->valor_desconto,
            'forma_pagamento' => $this->forma_pagamento,
            'status' => $this->status,
        ]);

        $syncData = [];
        foreach ($this->itens as $produto_id => $item) {
            $produto = $this->produtos->find($produto_id);
            if ($produto) {
                $syncData[$produto_id] = [
                    'quantidade' => $item['quantidade'],
                    'valor_unitario' => $produto->valor,
                ];
            }
        }
        $this->pedido->produtos()->sync($syncData);

        session()->flash('success', 'Pedido atualizado com sucesso!');
        return redirect()->route('pedidos.index');
    }

    public function render()
    {
        return view('livewire.pedidos.pedidos-edit');
    }
}
