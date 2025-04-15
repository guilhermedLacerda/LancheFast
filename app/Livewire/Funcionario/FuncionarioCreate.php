<?php

namespace App\Livewire\Funcionario;

use Livewire\Component;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Hash;

class FuncionarioCreate extends Component
{
    public $nome;
    public $cpf;
    public $email;
    public $senha;

    protected $rules = [
        'nome' => 'required|string|min:3|max:100',
        'cpf' => 'required|string|min:11|max:14',
        'email' => 'required|email|max:255',
        'senha' => 'required|string|min:6',
    ];

    protected $messages = [
        'nome.required' => 'O nome é obrigatório',
        'nome.min' => 'O nome deve ter pelo menos 3 caracteres',
        'cpf.required' => 'O CPF é obrigatório',
        'cpf.min' => 'O CPF deve ter pelo menos 11 caracteres',
        'email.required' => 'O email é obrigatório',
        'email.email' => 'O email deve ser válido',
        'senha.required' => 'A senha é obrigatória',
        'senha.min' => 'A senha deve ter pelo menos 6 caracteres',
    ];

    public function create()
    {
        $this->validate();

        Funcionario::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => Hash::make($this->senha),
        ]);

        session()->flash('success', 'Funcionário criado com sucesso!');

        return redirect()->route('funcionarios.index');
    }

    public function render()
    {
        return view('livewire.funcionario.funcionario-create');
    }
}
