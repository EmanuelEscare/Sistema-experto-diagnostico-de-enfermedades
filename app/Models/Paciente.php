<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'fecha_nacimiento',
        'email',
        'telefono',
        'sexo',
    ];

    public function cita()
    {
        return $this->hasOne(Profile::class);
    }
}
