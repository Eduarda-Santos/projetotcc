<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacinaFuncionario extends Model
{
    use HasFactory;
    public function sala() {
        return $this->hasOne('\App\Models\Vacina');
        }
    protected $table = "vacinasfuncionario";
    protected $fillable = ['vacina_id','funcionario_id','dose','dataVacina','lote'];
    //para o usuario puzar o nome do funcionario e da vacina
    use HasFactory;
}
    
