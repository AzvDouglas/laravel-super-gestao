<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'pedido_produtos', 'pedido_id', 'produto_id')->withPivot('id','created_at', 'quantidade');
        /*      BelongsToMany:
         * 1 - Produto::class => Modelo do relacionamento N:N que está sendo relacionado com este modelo
         * 2 - pedido_produtos => Nome da tabela auxiliar que está relacionando os dois modelos
         * 3 - pedido_id => Foreign key da tabela mapeada por esse modelo (Pedido) na tabela auxiliar
         * 4 - produto_id => Foreign key da tabela mapeada pelo modelo deste relacionamento (Produto) na tabela auxiliar
         */
    }
}

