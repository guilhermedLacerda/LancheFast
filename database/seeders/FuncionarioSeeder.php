<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Funcionario::create([
            'nome' => 'Funcionario Exemplo',
            'cpf' => '12345678901',
            'email' => 'funcionario@example.com',
            'senha' => bcrypt('senha123') 
        ]);

        Funcionario::create([
            'nome' => 'Funcionario Exemplo',
            'cpf' => '12345678902',
            'email' => 'funcionario@example.com01',
            'senha' => bcrypt('senha123') 
        ]);

        Funcionario::create([
            'nome' => 'Funcionario Exemplo',
            'cpf' => '12345678903',
            'email' => 'funcionario@example.com02',
            'senha' => bcrypt('senha123') 
        ]);
    }
}
