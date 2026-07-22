<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ausencia extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'empleado_id',
        'fecha_inicio',
        'fecha_fin',
        'tipo',
        'estado',
    ];

    /**
     * Conversión automatica de tipos al leer de la base de datos,
     */
    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    /**
     * Atributos virtuales que se incluyen al serializar el modelo.
     */
    protected $appends = ['dias'];

    /**
     * Cantidad de dias que dura la ausencia (incluye dia de inicio y fin).
     * Uso: $ausenci->dias // ej: fecha_inicio-10/07, fecha_fin-12/07 =>
     */
    public function getDiasAttribute()
    {
        return $this->fecha_inicio->diffInDays($this->fecha_fin) + 1;
    }

    /**
     * Una ausencia pertenece a un empleado (ausencias.empleado_id).
     * Uso: $ausencia->empleado->nombre_completo
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
