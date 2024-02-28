<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagoViaje extends Model
{
    use HasFactory;
    protected $table = "pagos_viajes";
    protected $fillable = ['inscripcion_viaje_id', 'precio'];
}
