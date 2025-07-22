<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Usuario;

class PermisoSeeder extends Seeder
{
    public function run(): void
    {
        $permisos = [
            // CRUD genérico
            'usuarios.index', 'usuarios.create', 'usuarios.edit', 'usuarios.delete',
            'clientes.index', 'clientes.create', 'clientes.edit', 'clientes.delete',
            'proveedores.index', 'proveedores.create', 'proveedores.edit', 'proveedores.delete',
            'categorias.index', 'categorias.create', 'categorias.edit', 'categorias.delete',
            'marcas.index', 'marcas.create', 'marcas.edit', 'marcas.delete',
            'productos.index', 'productos.create', 'productos.edit', 'productos.delete',
            'inventario.index', 'inventario.ajustar',
            'compras.index', 'compras.create', 'compras.edit', 'compras.delete',
            'ventas.index', 'ventas.create', 'ventas.edit', 'ventas.delete',
            'pagos.index', 'pagos.create', 'pagos.edit', 'pagos.delete',
            // Acciones especiales
            'registrarCompra', 'registrarVenta', 'exportarReportes', 'reportes.index',
        ];
        foreach ($permisos as $permiso) {
            Permission::firstOrCreate(['name' => $permiso, 'guard_name' => 'web']);
        }
        // Roles
        $admin = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $vendedor = Role::firstOrCreate(['name' => 'Vendedor', 'guard_name' => 'web']);
        $almacen = Role::firstOrCreate(['name' => 'Almacén', 'guard_name' => 'web']);
        $contador = Role::firstOrCreate(['name' => 'Contador', 'guard_name' => 'web']);
        // Asignar permisos
        $admin->syncPermissions(Permission::all());
        $vendedor->syncPermissions([
            'ventas.index', 'ventas.create', 'ventas.edit', 'ventas.delete',
            'clientes.index', 'clientes.create', 'clientes.edit', 'clientes.delete',
            'registrarVenta',
        ]);
        $almacen->syncPermissions([
            'productos.index', 'productos.create', 'productos.edit', 'productos.delete',
            'inventario.index', 'inventario.ajustar',
            'compras.index', 'compras.create', 'compras.edit', 'compras.delete',
            'registrarCompra',
        ]);
        $contador->syncPermissions([
            'reportes.index', 'exportarReportes',
            'pagos.index', 'pagos.create', 'pagos.edit', 'pagos.delete',
        ]);
        // Asignar rol Admin al usuario admin
        $usuarioAdmin = Usuario::where('email', 'admin@celupro.local')->first();
        if ($usuarioAdmin) {
            $usuarioAdmin->assignRole('Admin');
        }
    }
}
