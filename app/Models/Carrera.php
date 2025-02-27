<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carrera extends Model
{
    protected $table = 'carreras';
    protected $primaryKey = 'id';

    protected $fillable = [
        'area_id',
        'nombre',
    ];

    public function areas(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }
}
