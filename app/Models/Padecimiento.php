<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padecimiento extends Model
{
    use HasFactory;

    public function padecimientos_caracteristicas()
    {
        return $this->hasMany(Padecimientos_caracteristica::class);
    }

    public function caracteristicas()
    {
        return $this->hasManyThrough(
            Caracteristica::class,
            Padecimientos_caracteristica::class,
            'padecimiento_id',
            'id',
            'id',
            'caracteristica_id'
        )->withCount('padecimientos_caracteristicas')->orderByDesc('padecimientos_caracteristicas_count');
    }

    public function diagnostico()
    {
        return $this->hasOne(Diagnostico::class);
    }
}
