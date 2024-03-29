<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions() {
        return $this->hasMany('\App\Models\Permission');
    }
    protected $fillable = ['id', 'name'];
    use HasFactory;
}
