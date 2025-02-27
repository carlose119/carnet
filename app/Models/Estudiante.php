<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Contracts\Auditable;

class Estudiante extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

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
