<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ventas';
    protected $fillable = ['cliente_id', 'usuario_id', 'fecha', 'total'];

    public function cliente() { return $this->belongsTo(Cliente::class)->withDefault(); }
    public function usuario() { return $this->belongsTo(Usuario::class)->withDefault(); }
    public function detalles() { return $this->hasMany(DetalleVenta::class, 'venta_id'); }
    public function pagos() { return $this->hasMany(Pago::class, 'venta_id'); }

    public function scopeHoy($query) {
        return $query->whereDate('created_at', now()->toDateString());
    }
    public function scopeEntreFechas($query, $desde, $hasta) {
        return $query->whereBetween('created_at', [$desde, $hasta]);
    }
}
