<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacinaFuncionario extends Model
{
    protected $table = "vacinafuncionario";
    protected $fillable = ['vacina_id','funcionario_id','dose','dataVacina','lote'];
    //para o usuario puzar o nome do funcionario e da vacina
    use HasFactory;
}
