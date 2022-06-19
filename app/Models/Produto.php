<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = ['nome', 'descricao', 'peso', 'unit_id', 'fornecedor_id'];

    public function produtoDetalhe()
    {
        return $this->hasOne(ProdutoDetalhe::class, 'product_id', 'id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id');
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'pedido_produtos', 'produto_id', 'pedido_id');
    }

}
