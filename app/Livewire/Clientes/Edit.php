<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class Edit extends Component
{
    public $cliente;
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $senha;

    public function rules()
    {
        return [
            'nome' => 'required|string|min:3|max:100',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|regex:/^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/',
            'cpf' => 'required|unique:clientes,cpf,' . $this->cliente->id,
            'email' => 'required|email|unique:clientes,email,' . $this->cliente->id,
            'senha' => 'nullable|min:6',
        ];
    }

    protected $messages = [
        'nome.required' => 'O nome é obrigatório',
        'nome.min' => 'O nome deve ter pelo menos 3 caracteres',
        'endereco.required' => 'O endereço é obrigatório',
        'telefone.required' => 'O telefone é obrigatório',
        'telefone.regex' => 'Formato de telefone inválido',
        'cpf.required' => 'O CPF é obrigatório',
        'cpf.unique' => 'Este CPF já está cadastrado',
        'email.required' => 'O e-mail é obrigatório',
        'email.email' => 'Digite um e-mail válido',
        'email.unique' => 'Este e-mail já está cadastrado',
        'senha.min' => 'A senha deve ter pelo menos 6 caracteres',
    ];

    // Recebendo o model Cliente diretamente pela URL
    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;
        $this->nome = $cliente->nome;
        $this->endereco = $cliente->endereco;
        $this->telefone = $cliente->telefone;
        $this->cpf = $cliente->cpf;
        $this->email = $cliente->email;
    }

    public function update()
    {
        $this->validate();

        $data = [
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email
        ];

        if ($this->senha) {
            $data['senha'] = bcrypt($this->senha);
        }

        $this->cliente->update($data);

        session()->flash('success', 'Cliente atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.clientes.edit');
    }
}
