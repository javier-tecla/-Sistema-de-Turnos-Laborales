<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        $this->call([
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            UserTableSeeder::class,
        ]);
        \App\Models\User::factory(40)->create()->each(function($user) {
            $user->assignRole('user');
        });
        \App\Models\UserProfile::factory(43)->create();
        */
        $this->call([
            RoleSeeder::class,
        ]);

        $usuarioSuperAdmin = \App\Models\User::factory()->create([
            'username' => 'superadmin',
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'Admin@admin.com',
            'password' => bcrypt('12345678'),
            'phone_number' => '+12398190255',
            'user_type' => 'SUPER ADMINISTRADOR',
            'status' => 'active',
        ]);

        $usuarioSuperAdmin->assignRole('SUPER ADMINISTRADOR');
    }
}
