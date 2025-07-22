<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'compras';
    protected $fillable = ['proveedor_id', 'usuario_id', 'fecha', 'total'];

    public function proveedor() { return $this->belongsTo(Proveedor::class)->withDefault(); }
    public function usuario() { return $this->belongsTo(Usuario::class)->withDefault(); }
    public function detalles() { return $this->hasMany(DetalleCompra::class, 'compra_id'); }

    public function scopeHoy($query) {
        return $query->whereDate('created_at', now()->toDateString());
    }
    public function scopeEntreFechas($query, $desde, $hasta) {
        return $query->whereBetween('created_at', [$desde, $hasta]);
    }
}
