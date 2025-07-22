<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'categoria_id', 'marca_id'];

    public function categoria() { return $this->belongsTo(Categoria::class)->withDefault(); }
    public function marca() { return $this->belongsTo(Marca::class)->withDefault(); }
    public function inventario() { return $this->hasOne(Inventario::class); }

    public function scopeStockBajo($query, $umbral = 5) {
        return $query->whereHas('inventario', fn($q) => $q->where('cantidad', '<', $umbral));
    }
    public function scopeHoy($query) {
        return $query->whereDate('created_at', now()->toDateString());
    }
    public function scopeEntreFechas($query, $desde, $hasta) {
        return $query->whereBetween('created_at', [$desde, $hasta]);
    }
}
