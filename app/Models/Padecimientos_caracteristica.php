<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padecimientos_caracteristica extends Model
{
    use HasFactory;

    public function caracteristicas()
    {
        return $this->belongsTo(Caracteristica::class);
    }

    public function padecimientos()
    {
        return $this->belongsTo(Padecimiento::class);
    }
}
