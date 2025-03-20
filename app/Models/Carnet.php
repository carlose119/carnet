<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Contracts\Auditable;

class Carnet extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'carnets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'estudiante_id',
        'empleado_id',
        'autoridad_id',
        'fecha_emision',
        'fecha_vencimiento',
    ];

    public function estudiante(): BelongsTo
    {
        return $this->belongsTo(Estudiante::class, 'estudiante_id', 'id');
    }

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'empleado_id', 'id');
    }

    public function autoridad(): BelongsTo
    {
        return $this->belongsTo(Autoridad::class, 'autoridad_id', 'id');
    }
}
