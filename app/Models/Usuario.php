<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Usuario extends Model
{
    use HasFactory, HasRoles;

    protected $table = 'usuarios';
    protected $fillable = ['nombre', 'email', 'password', 'rol_id'];

    public function compras() { return $this->hasMany(Compra::class, 'usuario_id'); }
    public function ventas() { return $this->hasMany(Venta::class, 'usuario_id'); }
}
