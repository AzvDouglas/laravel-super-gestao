<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criando a coluna fornecedor_id na tabela produtos a direita do id do produto
        Schema::table('products', function (Blueprint $table) {
            //Inserindo registro de fornecedor para estabelecer relacionamento
            $fornecedorId = DB::table('fornecedor')->insertGetId([
                'nome' => 'Fornecedor Padrão SG',
                'site' => 'www.fornecedorpsg.com.br',
                'uf' => 'ES',
                'email' => 'contato@fornecedor.psg'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedorId)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedor');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
};
