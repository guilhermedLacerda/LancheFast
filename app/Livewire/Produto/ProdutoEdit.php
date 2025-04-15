<?php

namespace App\Livewire\Produto;

use Livewire\Component;
use App\Models\Produto;

class ProdutoEdit extends Component
{
    public $produto;
    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;

    protected function rules()
    {
        return [
            'nome' => 'required|string|min:3|max:100',
            'ingredientes' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
            'imagem' => 'nullable|string|max:255',
        ];
    }

    protected $messages = [
        'nome.required' => 'O nome é obrigatório',
        'nome.min' => 'O nome deve ter pelo menos 3 caracteres',
        'ingredientes.required' => 'Os ingredientes são obrigatórios',
        'valor.required' => 'O valor é obrigatório',
        'valor.numeric' => 'O valor deve ser um número',
        'valor.min' => 'O valor deve ser maior ou igual a zero',
    ];

    public function mount(Produto $produto)
    {
        $this->produto = $produto;
        $this->nome = $produto->nome;
        $this->ingredientes = $produto->ingredientes;
        $this->valor = $produto->valor;
        $this->imagem = $produto->imagem;
    }

    public function update()
    {
        $this->validate();

        $this->produto->update([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $this->imagem,
        ]);

        session()->flash('success', 'Produto atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.produto.produto-edit');
    }
}
