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
            $table->unsignedBigInteger('funcionario_id');
            $table->integer('dose');
            $table->date('dataVacina');
            $table->string('lote');
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
