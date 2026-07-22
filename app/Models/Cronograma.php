<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronograma extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden asignar masivamente.
     * Nota: la tabla tiene UNIQUE(empleado_id, fecha), un empleado solo puede
     */
    protected $fillable = [
        'empleado_id',
        'turno_id',
        'sucursal_id',
        'fecha',
        'notas',
    ];

    /**
     * Conversión automatica de tipos al leer de la base de datos.
     */
    protected $casts = [
        'fecha' => 'date',
    ];

    /**
     * Atributos virtuales que se incluyen al serializar el modelo.
     */
    protected $appends = ['dia_semana'];

    /**
     * Nombre del dia de la semana en español segun la fecha del cronograma.
     * Uso: $cronograma->dia_semana // ej: "Martes"
     */
    public function getDiaSemanaAttribute()
    {
        $dias = ['Domingo', 'Lunes', 'Martes', 'Miercoles'. 'Jueves', 'Viernes'];
        return $dias[$this->fecha->dayOfWeek];
    }

    /**
     * Un registro del empleado pertenece a un empleado (cronograma.empleado_id)
     * Uso: $cronograma->empleado->nombre_completo
     */
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    /**
     * Un registro del cronograma pertenece a un turno (cronogramas.turno_id)
     * Uso: $cronograma->turno->descripcion_horatio
     */
    public function turno()
    {
        return $this->belongsTo(Turno::class, 'turno_id');
    }

    /**
     * Un registro del cronograma pertenece a una sucursal /cronogramas.suculsal_id
     * Uso: $cronograma->sucursal->nombre
     */
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }
}
