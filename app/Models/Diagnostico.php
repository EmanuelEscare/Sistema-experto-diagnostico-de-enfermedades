<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;

    protected $fillable = [
        'cita_id',
        'padecimiento_id',
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    public function padecimiento()
    {
        return $this->belongsTo(Padecimiento::class);
    }

    public function receta()
    {
        return $this->hasOne(Receta::class);
    }
}
