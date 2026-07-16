<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();

            $table->foreignId('usuario_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('nombres', 255);
            $table->string('apellidos', 255);
            $table->enum('tipo_doc', ['CI', 'DNI', 'RUC', 'PASAPORTE', 'OTRO']);
            $table->string('numero_doc', 50)->unique();
            $table->string('telefono', 50)->nullable();
            $table->text('direccion')->nullable();
            $table->string('profesion', 150)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('genero', ['M', 'F'])->nullable();
            $table->string('avatar', 255)->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
