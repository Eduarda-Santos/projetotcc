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
        Schema::create('vacinasfuncionario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vacina_id');
            $table->foreign('vacina_id')->references('id')->on('vacinas');
            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->integer('dose');
            $table->date('dataVacina');
            $table->string('lote')->nullable();
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
        Schema::dropIfExists('vacinasFuncionario');
    }
};
