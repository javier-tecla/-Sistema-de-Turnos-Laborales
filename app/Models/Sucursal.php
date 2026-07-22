<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'nombre',
        'direccion',
    ];

    /**
     * Una sucursal tiene muchos registros en el cronograma /cronograma.
     * Uso: $sucursal->cronogramas
     */
    public function cronogramas()
    {
        return $this->hasMany(Cronograma::class, 'sucursal_id');
    }
}
