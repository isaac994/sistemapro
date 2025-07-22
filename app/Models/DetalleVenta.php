<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleVenta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'detalle_ventas';
    protected $fillable = ['venta_id', 'producto_id', 'cantidad', 'precio_unitario', 'subtotal'];

    public function venta() { return $this->belongsTo(Venta::class)->withDefault(); }
    public function producto() { return $this->belongsTo(Producto::class)->withDefault(); }

    public function scopeHoy($query) {
        return $query->whereDate('created_at', now()->toDateString());
    }
    public function scopeEntreFechas($query, $desde, $hasta) {
        return $query->whereBetween('created_at', [$desde, $hasta]);
    }
}
