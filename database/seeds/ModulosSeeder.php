<?php

use Illuminate\Database\Seeder;

class ModulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modulos')->insert([
            'nombre'           => "Dashboard",
            'dir'              => "../app/img/inicio.png",
            'refId'            => "inicio",
            'icono'            => "tachometer",
            'link'             => "dashboard",
            'tipo'             => 0,
            'estado'           => 1,
            'orden'            => 1,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);

        DB::table('modulos')->insert([
            'nombre'           => "Sucursales",
            'dir'              => "../app/img/usuariotab.png",
            'refId'            => "sucursales",
            'icono'            => "sitemap",
            'link'             => "sucursales",
            'tipo'             => 0,
            'estado'           => 1,
            'orden'            => 2,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);

        DB::table('modulos')->insert([
            'nombre'           => "Usuarios",
            'dir'              => "../app/img/usuariotab.png",
            'refId'            => "usuario",
            'icono'            => "users",
            'link'             => "usuarios",
            'tipo'             => 0,
            'estado'           => 1,
            'orden'            => 3,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);

        DB::table('modulos')->insert([
            'nombre'           => "Mesas",
            'dir'              => "../app/img/carro-de-la-compra.png",
            'refId'            => "mesas",
            'icono'            => " fa-cutlery",
            'link'             => "mesas",
            'tipo'             => 0,
            'estado'           => 1,
            'orden'            => 4,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);

        DB::table('modulos')->insert([
            'nombre'           => "Comidas",
            'dir'              => "../app/img/etiqueta-del-precio.png",
            'refId'            => "comidas",
            'icono'            => " fa-coffee",
            'link'             => "comidas",
            'tipo'             => 0,
            'estado'           => 1,
            'orden'            => 5,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        
        DB::table('modulos')->insert([
            'nombre'           => "Combos",
            'dir'              => "../app/img/diagrama.png",
            'refId'            => "combos",
            'icono'            => " fa-puzzle-piece",
            'link'             => "combos",
            'tipo'             => 1,
            'estado'           => 1,
            'orden'            => 6,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        
        DB::table('modulos')->insert([
            'nombre'           => "Cuentas",
            'dir'              => "../app/img/diagrama.png",
            'refId'            => "cuentas",
            'icono'            => "cogs",
            'link'             => "cuentas",
            'tipo'             => 0,
            'estado'           => 1,
            'orden'            => 7,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        
        DB::table('modulos')->insert([
            'nombre'           => "Comida Ingrediente",
            'dir'              => "../app/img/diagrama.png",
            'refId'            => "comida-ingredientes",
            'icono'            => " fa-cart-plus",
            'link'             => "comida-ingredientes",
            'tipo'             => 1,
            'estado'           => 1,
            'orden'            => 8,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);

        DB::table('modulos')->insert([
            'nombre'           => "Ingredientes",
            'dir'              => "../app/img/notas.png",
            'refId'            => "ingredientes",
            'icono'            => " fa-fire",
            'link'             => "ingredientes",
            'tipo'             => 1,
            'estado'           => 1,
            'orden'            => 9,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        
        DB::table('modulos')->insert([
            'nombre'           => "Clientes",
            'dir'              => "../app/img/diagrama.png",
            'refId'            => "clientes",
            'icono'            => "ticket",
            'link'             => "clientes",
            'tipo'             => 1,
            'estado'           => 1,
            'orden'            => 10,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);

        DB::table('modulos')->insert([
            'nombre'           => "Estadistica",
            'dir'              => "../app/img/reparacion-mecanismo.png",
            'refId'            => "estadistica",
            'icono'            => "list-alt",
            'link'             => "estadistica",
            'tipo'             => 1,
            'estado'           => 1,
            'orden'            => 11,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);

    }
}
