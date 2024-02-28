<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "clientes";
    protected $fillable = ['nif', 'nombre', 'apellido1', 'apellido2', 'fecha_nacimiento', 'foto', 'observaciones'];

}
