<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Contracts\Auditable;

class Area extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
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
