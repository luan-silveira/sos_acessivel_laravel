<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()     {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@cbm.com',
            'tipo' => 1,
            'id_instituicao' => 1,
            'password' => bcrypt('admin123'),
        ]);
        
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@pm.com',
            'tipo' => 1,
            'id_instituicao' => 2,
            'password' => bcrypt('admin123'),
        ]);
        
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@samu.com',
            'tipo' => 1,
            'id_instituicao' => 3,
            'password' => bcrypt('admin123'),
        ]);
    }
}
