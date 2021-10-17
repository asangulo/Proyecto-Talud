<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Gerente']);
        $role3 = Role::create(['name' => 'Cliente']);
        $role4 = Role::create(['name' => 'Proveedor']);
        $role5 = Role::create(['name' => 'Ingeniero']);


        Permission::create(['name' => 'home'])->syncRoles([$role1, $role2, $role3, $role4, $role5 ]);

        Permission::create(['name' => 'usuarios.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuario.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.edit'])->syncRoles([$role1]);
        Permission::create(['name' => 'usuarios.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'marcas.index'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'marcas.create'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'marcas.edit'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'marcas.destroy'])->syncRoles([$role1, $role4 ]);

        Permission::create(['name' => 'tipoMateriales.index'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'tipoMateriales.create'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'tipoMateriales.edit'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'tipoMateriales.destroy'])->syncRoles([$role1, $role4 ]);

        Permission::create(['name' => 'materiales.index'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'materiales.create'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'materiales.edit'])->syncRoles([$role1, $role4 ]);
        Permission::create(['name' => 'materiales.destroy'])->syncRoles([$role1, $role4 ]);

        Permission::create(['name' => 'entradas.index'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'entradas.create'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'entradas.edit'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'entradas.destroy'])->syncRoles([$role1, $role2, $role4 ]);

        Permission::create(['name' => 'obras.index'])->syncRoles([$role1, $role2, $role3, $role5,]);
        Permission::create(['name' => 'obras.create'])->syncRoles([$role1, $role5,]);
        Permission::create(['name' => 'obras.edit'])->syncRoles([$role1, $role5,]);
        Permission::create(['name' => 'obras.destroy'])->syncRoles([$role1, $role5,]);

        Permission::create(['name' => 'entradaMateriales.index'])->syncRoles([$role1, $role2,  $role4, $role5,]);
        Permission::create(['name' => 'entradaMateriales.create'])->syncRoles([$role1,  $role4, $role5,]);
        Permission::create(['name' => 'entradaMateriales.edit'])->syncRoles([$role1,  $role4, $role5,]);
        Permission::create(['name' => 'entradaMateriales.destroy'])->syncRoles([$role1,  $role4, $role5,]);

        Permission::create(['name' => 'proveedores.index'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'proveedores.create'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'proveedores.edit'])->syncRoles([$role1, $role2, $role4 ]);
        Permission::create(['name' => 'proveedores.destroy'])->syncRoles([$role1 ]);

        Permission::create(['name' => 'categorias.index'])->syncRoles([$role1, $role2, $role5,]);
        Permission::create(['name' => 'categorias.create'])->syncRoles([$role1, $role5,]);
        Permission::create(['name' => 'categorias.edit'])->syncRoles([$role1, $role5,]);
        Permission::create(['name' => 'categorias.destroy'])->syncRoles([$role1, $role5,]);

        Permission::create(['name' => 'clientes.index'])->syncRoles([$role1, $role3, $role2, $role5,]);
        Permission::create(['name' => 'clientes.create'])->syncRoles([$role1, $role3, $role2 ]);
        Permission::create(['name' => 'clientes.edit'])->syncRoles([$role1, $role3, $role2 ]);
        Permission::create(['name' => 'clientes.destroy'])->syncRoles([$role1, $role2 ]);

        Permission::create(['name' => 'salidas.index'])->syncRoles([$role1, $role2 ]);
        Permission::create(['name' => 'salidas.create'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'salidas.edit'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'salidas.destroy'])->syncRoles([$role1 ]);

        Permission::create(['name' => 'salidasMateriales.index'])->syncRoles([$role1, $role2 ]);
        Permission::create(['name' => 'salidasMateriales.create'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'salidasMateriales.edit'])->syncRoles([$role1 ]);
        Permission::create(['name' => 'salidasMateriales.destroy'])->syncRoles([$role1 ]);



    }
}
