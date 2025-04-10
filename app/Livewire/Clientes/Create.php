<?php

namespace App\Livewire\Clientes;

use Livewire\Component;

class Create extends Component
{
    // Propriedades públicas para o formulário
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $senha;

    // Método render que exibe a view
    public function render()
    {
        return view('livewire.clientes.create');
    }

    public function store(){

        \App\Models\Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => bcrypt($this->senha),
        ]);
    }
    // Método para salvar o cliente
    public function save()
    {
        // Validação dos campos do formulário
        $this->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'cpf' => 'required|cpf|unique:clientes,cpf',
            'email' => 'required|email|unique:clientes,email',
            'senha' => 'required|min:6',
        ]);

        // Criando o novo cliente no banco de dados
        
        // Mensagem de sucesso
        session()->flash('success', 'Cliente cadastrado com sucesso!');
        
        // Resetando os campos do formulário
        $this->reset();
    }
}
