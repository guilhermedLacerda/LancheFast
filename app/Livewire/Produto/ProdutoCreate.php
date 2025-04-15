<?php

namespace App\Livewire\Produto;

use Livewire\Component;
use App\Models\Produto;

class ProdutoCreate extends Component
{
    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;

    protected $rules = [
        'nome' => 'required|string|min:3|max:100',
        'ingredientes' => 'required|string|max:255',
        'valor' => 'required|numeric|min:0',
        'imagem' => 'nullable|string|max:255',
    ];

    protected $messages = [
        'nome.required' => 'O nome é obrigatório',
        'nome.min' => 'O nome deve ter pelo menos 3 caracteres',
        'ingredientes.required' => 'Os ingredientes são obrigatórios',
        'valor.required' => 'O valor é obrigatório',
        'valor.numeric' => 'O valor deve ser um número',
        'valor.min' => 'O valor deve ser maior ou igual a zero',
    ];

    public function create()
    {
        $this->validate();

        Produto::create([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $this->imagem,
        ]);

        session()->flash('success', 'Produto criado com sucesso!');

        return redirect()->route('produtos.index');
    }

    public function render()
    {
        return view('livewire.produto.produto-create');
    }
}
