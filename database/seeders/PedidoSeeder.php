<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedidos;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar um cliente existente
        $cliente = Cliente::first();

        // Buscar alguns produtos existentes
        $produtos = Produto::take(3)->get();

        if (!$cliente || $produtos->isEmpty()) {
            $this->command->info('Cliente ou produtos não encontrados. Certifique-se de que existam dados para clientes e produtos.');
            return;
        }

        // Calcular valor total e valor com desconto (exemplo 10% desconto)
        $valorTotal = $produtos->sum('valor');
        $valorDesconto = $valorTotal * 0.10;

        // Criar pedido
        $pedido = Pedidos::create([
            'data_hora_pedido' => Carbon::now(),
            'cliente_id' => $cliente->id,
            'valor_total' => $valorTotal,
            'valor_desconto' => $valorDesconto,
            'forma_pagamento' => 'Pix',
            'status' => Pedidos::STATUS_EM_ABERTO,
        ]);

        // Associar produtos ao pedido com quantidade e valor unitário
        foreach ($produtos as $produto) {
            $pedido->produtos()->attach($produto->id, [
                'quantidade' => rand(1, 3),
                'valor_unitario' => $produto->valor,
            ]);
        }

        $this->command->info('Pedido automático criado com sucesso.');
    }
}
