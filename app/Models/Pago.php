<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';
    protected $fillable = ['venta_id', 'monto', 'fecha_pago', 'metodo_pago'];

    public function venta() { return $this->belongsTo(Venta::class)->withDefault(); }
}
