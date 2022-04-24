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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit', 5);
            $table->string('description', 30);
            $table->timestamps();
        });
        //Relacionamento com a tabela produtcs
        Schema::table('products', function (Blueprint $table) {
           $table->unsignedBigInteger('unit_id');
           $table->foreign('unit_id')->references('id')->on('units');
        });
        //Relacionamento com a tabela produtc_details
        Schema::table('product_details', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Removendo relacionamento com a tabela product_details
        Schema::table('product_details', function (Blueprint $table) {
            //                          [table]_[column]_foreign
            $table->dropForeign('product_details_unit_id_foreign');
            $table->dropColumn('unit_id');
        });
        //Removendo relacionamento com a tabela products
        Schema::table('products', function (Blueprint $table) {
            //  [table]_[column]_foreign
            $table->dropForeign('products_unit_id_foreign');
            $table->dropColumn('unit_id');
        });

        Schema::dropIfExists('units');
    }
};

