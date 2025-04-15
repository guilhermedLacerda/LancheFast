<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrador;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Administrador::create([
            'nome' => 'Admin Principal',
            'cpf' => '00000000000',
            'email' => 'admin@lanchefast.com',
            'senha' => 'password123', // Will be hashed by model mutator
        ]);
    }
}
