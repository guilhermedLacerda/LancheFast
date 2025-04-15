<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'ingredientes',
        'valor',
        'imagem',
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedidos::class, 'pedido_produto', 'produto_id', 'pedido_id')
            ->withPivot('quantidade', 'valor_unitario')
            ->withTimestamps();
    }
}