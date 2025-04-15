<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

class AdminEdit extends Component
{
    public $adminId;
    public $nome;
    public $cpf;
    public $email;
    public $senha;

    protected function rules()
    {
        return [
            'nome' => 'required|string|min:3|max:100',
            'cpf' => 'required|string|min:11|max:14|unique:administradors,cpf,' . $this->adminId,
            'email' => 'required|email|max:255|unique:administradors,email,' . $this->adminId,
            'senha' => 'nullable|string|min:6',
        ];
    }

    protected $messages = [
        'nome.required' => 'O nome é obrigatório',
        'nome.min' => 'O nome deve ter pelo menos 3 caracteres',
        'cpf.required' => 'O CPF é obrigatório',
        'cpf.min' => 'O CPF deve ter pelo menos 11 caracteres',
        'cpf.unique' => 'O CPF já está em uso',
        'email.required' => 'O email é obrigatório',
        'email.email' => 'O email deve ser válido',
        'email.unique' => 'O email já está em uso',
        'senha.min' => 'A senha deve ter pelo menos 6 caracteres',
    ];

    public function mount($id)
    {
        $admin = Administrador::findOrFail($id);
        $this->adminId = $admin->id;
        $this->nome = $admin->nome;
        $this->cpf = $admin->cpf;
        $this->email = $admin->email;
    }

    public function update()
    {
        $this->validate();

        $admin = Administrador::findOrFail($this->adminId);
        $admin->nome = $this->nome;
        $admin->cpf = $this->cpf;
        $admin->email = $this->email;

        if ($this->senha) {
            $admin->senha = Hash::make($this->senha);
        }

        $admin->save();

        session()->flash('success', 'Administrador atualizado com sucesso!');

        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit');
    }
}
