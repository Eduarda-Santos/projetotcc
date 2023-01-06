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
    public function up() {
        Schema::create('funcionarios', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->integer('telefone');
        $table->string('endereco');
        $table->string('sexo');
        $table->dateTime('dataNascimento')->nullable();
        $table->integer('telefoneEmergencia');
        $table->boolean('ativo');
        $table->string('email')->unique();
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
        Schema::dropIfExists('funcionarios');
    }
};
