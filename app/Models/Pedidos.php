<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedidos extends Model
{
    const STATUS_EM_ABERTO = 'Em Aberto';
    const STATUS_AGUARDANDO_PREPARO = 'Aguardando Preparo';
    const STATUS_EM_PREPARO = 'Em Preparo';
    const STATUS_EM_ROTA_ENTREGA = 'Em Rota de Entrega';
    const STATUS_ENTREGUE = 'Entregue';

    const FORMAS_PAGAMENTO = [
        'Cartão de Crédito',
        'Débito',
        'Pix',
        'Dinheiro',
    ];

    protected $fillable = [
        'data_hora_pedido',
        'cliente_id',
        'valor_total',
        'valor_desconto',
        'forma_pagamento',
        'status',
    ];

    protected $casts = [
        'data_hora_pedido' => 'datetime',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function produtos(): BelongsToMany
    {
        return $this->belongsToMany(Produto::class, 'pedido_produto', 'pedido_id', 'produto_id')
            ->withPivot('quantidade', 'valor_unitario')
            ->withTimestamps();
    }
}
