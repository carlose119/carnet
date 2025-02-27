<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Contracts\Auditable;

class Carrera extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'carreras';
    protected $primaryKey = 'id';

    protected $fillable = [
        'area_id',
        'nombre',
        'imagen_carnet',
    ];

    public function areas(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }
}
