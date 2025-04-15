<?php

namespace App\Livewire\Funcionario;

use Livewire\Component;
use App\Models\Funcionario;

class FuncionarioShow extends Component
{
    public $funcionario;

    public function mount(Funcionario $funcionario)
    {
        $this->funcionario = $funcionario;
    }

    public function render()
    {
        return view('livewire.funcionario.funcionario-show');
    }
}
