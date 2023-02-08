<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public function permissions() {
        return $this->hasMany('\App\Models\Permission');
    }
    use HasFactory;
    protected $table = "resources";
    protected $fillable = ['id', 'name'];
}
