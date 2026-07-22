<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'usuario_id',
        'nombres',
        'apellidos',
        'tipo_doc',
        'numero_doc',
        'telefono',
        'direccion',
        'profesion',
        'fecha_nacimiento',
        'genero',
        'avatar',
        'estado',
    ];

    /**
     * Conversión automática de tipos al leer de la base de datos.
     */
    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    /**
     * Atributos virtuales que se incluyen al serializar el modelo.
     * Uso: $empleado->nombre_completo
     */
    public function getNombreCompletoAttribute()
    {
        return $this->nombres . ' ' . $this->apellidos;
    }

    /**
     * Un empleado puede estar vinculado a un usuario del sistema (empleados)
     * Uso: $empleado->usuario->mail
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    /**
     * Un empleado tiene muchas ausencias (ausencias.empleado_id).
     * Uso: $empleado->ausencias
     */
    public function ausencias()
    {
        return $this->hasMany(Ausencia::class, 'empleado_id');
    }

    /**
     * Un empleado tiene muchos registros en el cronograma /cronogramas.empleado
     * Uso: $empleado->cronogramas
     */
    public function cronogramas()
    {
        return $this->hasMany(Cronograma::class, 'empleado_id');
    }
    
    
}
