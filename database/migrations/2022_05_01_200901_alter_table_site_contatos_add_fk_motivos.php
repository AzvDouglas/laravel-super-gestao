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
        //Criando coluna motivos_contatos_id na tabela site_contatos
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivos_id');
        });

        //Atribuindo motivo para a nova coluna motivo_id
            DB::statement('update site_contatos set motivos_id = motivo');

            //Foreign key & derrubando antiga coluna motivo
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivos_id')->references('id')->on('motivos');
            $table->dropColumn('motivo');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Recriando antiga coluna motivo na tabela site_contatos
        Schema::table('site_contatos', function (Blueprint $table) {
           $table->integer('motivo');
           $table->dropForeign('site_contatos_motivos_id_foreign'); //<tabela>_<coluna>_foreign
        });

        //Derrubando coluna motivos_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivos_id');
        });
    }
};
