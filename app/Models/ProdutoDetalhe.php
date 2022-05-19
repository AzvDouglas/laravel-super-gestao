<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    use HasFactory;

    protected $table = 'product_details';
    protected $fillable = ['product_id', 'length', 'width', 'height', 'unit_id'];

    public function produto() {
        //Como a chave estrangeira não segue o padrão Laravel é preciso especificar o nome dela na função
        return $this->belongsTo(Produto::class, 'product_id');
    }
}
