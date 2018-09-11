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
    }
}
