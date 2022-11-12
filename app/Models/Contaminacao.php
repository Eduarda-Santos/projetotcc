<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contaminacao extends Model
{
    protected $table = "contaminacoes";
    protected $fillable = ['dataInicioSintomas','dataInicioAfastamento','dataRealizacaoExame','resultadoExame','dataTerminoAfastamento','anexo','descricao'];
    use HasFactory;
}
