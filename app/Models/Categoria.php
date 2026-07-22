<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'nombre',
    ];

    /**
     * Una categoria tiene muchos turnos (turnos.categoria_id).
     * Uso: $categoria->turnos
     */
    public function turnos()
    {
        return $this->hasMany(Turno::class, 'categoria_id');
    }
}
