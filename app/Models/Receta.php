<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'diagnostico_id',
        'indicaciones',
    ];

    public function diagnostico()
    {
        return $this->belongsTo(Diagnostico::class);
    }
}
