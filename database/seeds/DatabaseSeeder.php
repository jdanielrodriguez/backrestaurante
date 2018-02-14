<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(SucursalesSeeder::class);
        $this->call(ModulosSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(AccesosSeeder::class);
    }
}
