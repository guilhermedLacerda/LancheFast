<?php

namespace App\Livewire\Funcionario;

use Livewire\Component;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Hash;

class FuncionarioEdit extends Component
{
    public $funcionario;
    public $nome;
    public $cpf;
    public $email;
    public $senha;

    protected function rules()
    {
        return [
            'nome' => 'required|string|min:3|max:100',
            'cpf' => 'required|string|min:11|max:14',
            'email' => 'required|email|max:255',
            'senha' => 'nullable|string|min:6',
        ];
    }

    protected $messages = [
        'nome.required' => 'O nome é obrigatório',
        'nome.min' => 'O nome deve ter pelo menos 3 caracteres',
        'cpf.required' => 'O CPF é obrigatório',
        'cpf.min' => 'O CPF deve ter pelo menos 11 caracteres',
        'email.required' => 'O email é obrigatório',
        'email.email' => 'O email deve ser válido',
        'senha.min' => 'A senha deve ter pelo menos 6 caracteres',
    ];

    public function mount(Funcionario $funcionario)
    {
        $this->funcionario = $funcionario;
        $this->nome = $funcionario->nome;
        $this->cpf = $funcionario->cpf;
        $this->email = $funcionario->email;
        $this->senha = null;
    }

    public function update()
    {
        $this->validate();

        $data = [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
        ];

        if ($this->senha) {
            $data['senha'] = Hash::make($this->senha);
        }

        $this->funcionario->update($data);

        session()->flash('success', 'Funcionário atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.funcionario.funcionario-edit');
    }
}
