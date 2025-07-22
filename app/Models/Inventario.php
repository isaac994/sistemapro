<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventario extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'inventario';
    protected $fillable = ['producto_id', 'cantidad'];

    public function producto() { return $this->belongsTo(Producto::class)->withDefault(); }

    public function scopeStockBajo($query, $umbral = 5) {
        return $query->where('cantidad', '<', $umbral);
    }
    public function scopeHoy($query) {
        return $query->whereDate('created_at', now()->toDateString());
    }
    public function scopeEntreFechas($query, $desde, $hasta) {
        return $query->whereBetween('created_at', [$desde, $hasta]);
    }
}
