<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear Roles
        $padreFamilia = Role::create(['name' => 'padre_familia']);
        $secretaria = Role::create(['name' => 'secretaria']);
        $director = Role::create(['name' => 'director']);
        
        // Crear Permisos
        Permission::create(['name' => 'solicitar licencia']);
        Permission::create(['name' => 'pagar mensualidad']);
        Permission::create(['name' => 'aprobar licencia']);
        Permission::create(['name' => 'aprobar pago']);
        Permission::create(['name' => 'ver reporte de deudores']);
        
        // Asignar permisos a los roles
        $padreFamilia->givePermissionTo('solicitar licencia', 'pagar mensualidad');
        $secretaria->givePermissionTo('aprobar licencia', 'aprobar pago', 'ver reporte de deudores');
        $director->givePermissionTo('aprobar licencia', 'aprobar pago', 'ver reporte de deudores');
    }
}
