<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function resource() {
        return $this->belongsTo('\App\Models\Resource');
    }
    public function role() {
        return $this->belongsTo('\App\Models\Role');
    }
    protected $table = "permissions";
    protected $fillable = ['resource_id', 'role_id','permissao'];
    use HasFactory;
}
