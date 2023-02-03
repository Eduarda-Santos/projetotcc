<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contaminacao extends Model
{
    public function funcionario() {
        return $this->hasOne('\App\Models\Funcionario');
    }
    protected $table = "contaminacoes";
    protected $fillable = ['funcionario_id','dataInicioSintomas','dataInicioAfastamento','dataRealizacaoExame','resultadoExame','dataTerminoAfastamento','anexo','descricao'];
    use HasFactory;
}
