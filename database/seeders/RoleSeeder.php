<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'SUPER ADMINISTRADOR', 'guard_name' => 'web', 'title' => 'Super Administrador']);
        $supervisor = Role::create(['name' => 'SUPERVISOR', 'guard_name' => 'web', 'title' => 'Supervisor']);
        $empleado = Role::create(['name' => 'EMPLEADO', 'guard_name' => 'web', 'title' => 'Empleado']);
    }
}
