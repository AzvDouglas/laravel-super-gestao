<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        //Criando a tabela filials
        Schema::create('filials', function (Blueprint $table) {
           $table->id();
           $table->string('filial', 30);
           $table->timestamps();
        });
        //Criando a tabela product_filials
        Schema::create('products_filials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('preco_venda',8,2 );
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();
            //Foreign keys (constrains)
            $table->foreign('filial_id')->references('id')->on('filials');
            $table->foreign('product_id')->references('id')->on('products');
        });
        //Removendo colunas da tabela products
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('preco_venda', 'estoque_minimo','estoque_maximo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('filials', function (Blueprint $table) {
            $table->decimal('preco_venda',8,2);
            $table->integer('estoque_minimo',8,2);
            $table->integer('estoque_maximo',8,2);
        });*/

        Schema::dropIfExists('products_filials');
        Schema::dropIfExists('filials');
    }
};
