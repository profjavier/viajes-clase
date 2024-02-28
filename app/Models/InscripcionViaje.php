<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionViaje extends Model
{
    use HasFactory;
    protected $table = "inscripcion_viajes";
    protected $fillable = ['viaje_id', 'cliente_id'];
}
