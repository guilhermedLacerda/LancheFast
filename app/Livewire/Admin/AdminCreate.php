<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

class AdminCreate extends Component
{
    public $nome;
    public $cpf;
    public $email;
    public $senha;

    protected $rules = [
        'nome' => 'required|string|min:3|max:100',
        'cpf' => 'required|string|min:11|max:14|unique:administradors,cpf',
        'email' => 'required|email|max:255|unique:administradors,email',
        'senha' => 'required|string|min:6',
    ];

    protected $messages = [
        'nome.required' => 'O nome é obrigatório',
        'nome.min' => 'O nome deve ter pelo menos 3 caracteres',
        'cpf.required' => 'O CPF é obrigatório',
        'cpf.min' => 'O CPF deve ter pelo menos 11 caracteres',
        'cpf.unique' => 'O CPF já está em uso',
        'email.required' => 'O email é obrigatório',
        'email.email' => 'O email deve ser válido',
        'email.unique' => 'O email já está em uso',
        'senha.required' => 'A senha é obrigatória',
        'senha.min' => 'A senha deve ter pelo menos 6 caracteres',
    ];

    public function create()
    {
        $this->validate();

        Administrador::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => Hash::make($this->senha),
        ]);

        session()->flash('success', 'Administrador criado com sucesso!');

        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.admin.admin-create');
    }
}
