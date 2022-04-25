<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='fornecedores'; //É necessário especificar a tabela
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}