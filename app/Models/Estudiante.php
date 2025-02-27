<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'carrera_id',
        'cedula',
        'nombre',
        'parroquia',
    ];

    public function carreras(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'carrera_id', 'id');
    }
}
