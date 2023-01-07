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
        Schema::create('contaminacoes', function (Blueprint $table) {
            $table->id();
            $table->date('dataInicioSintomas');
            $table->date('dataInicioAfastamento');
            $table->date('dataRealizacaoExame');
            $table->string('resultadoExame');
            $table->date('dataTerminoAfastamento');
            $table->text('anexo');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contaminacoes');
    }
};
