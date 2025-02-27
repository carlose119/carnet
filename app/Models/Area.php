<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'imagen_carnet',
    ];

    public function carreras(): HasMany
    {
        return $this->hasMany(Carrera::class)->chaperone();
    }
}
