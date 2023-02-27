<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $usuario = new User();

        $usuario->nombre = "boda";
        $usuario->apellido = "unaisilvia";
        $usuario->correo ='bodaunaisilvia@gmail.com';
        $usuario->transporte = 'No';
        $usuario->tipo = 'Admin';
        $usuario->password = "$2a$12$8aBuEW6oXU19lwDUnwk7ne3GekB3pa5B8dPglOjqAXgOPC/aE/uc6";

        $usuario->save();

    }
}
