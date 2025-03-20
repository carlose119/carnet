<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Contracts\Auditable;

class Cargo extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'cargos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'imagen_carnet',
    ];

    public function empleados(): HasMany
    {
        return $this->hasMany(Empleado::class)->chaperone();
    }
}
