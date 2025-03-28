<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Audit;
use OwenIt\Auditing\Contracts\Auditable;

class Autoridad extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'autoridades';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'cedula',
        'cargo',
        'firma',
        'sello',
        'resolucion',
        'activo',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($autoridad) {
            if ($autoridad->activo) {
                static::where('id', '!=', $autoridad->id)
                    ->where('activo', true)
                    ->update(['activo' => false]);
            }
        });
    }

}
