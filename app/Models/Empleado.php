<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Contracts\Auditable;

class Empleado extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'empleados';
    protected $primaryKey = 'id';

    protected $fillable = [
        'departamento_id',
        'cargo_id',
        'cedula',
        'nombre',
        'imagen',
    ];

    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class, 'departamento_id', 'id');
    }

    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }
}
