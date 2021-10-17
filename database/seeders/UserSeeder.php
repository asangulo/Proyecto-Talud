<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Administrador');

        // Gerente
        User::create([
            'name' => 'Gerente',
            'email' => 'gerente@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Gerente');

        // Cliente
        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Cliente');

        // Proveedor
        User::create([
            'name' => 'Proveedor',
            'email' => 'proveedor@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Proveedor');

        //Ingeniero
        User::create([
            'name' => 'Ingeniero',
            'email' => 'ingeniero@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Ingeniero');

        User::factory(2)->create();
    }
}
