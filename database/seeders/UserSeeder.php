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

        $usuario->nombre = "mikel";
        $usuario->apellido = "urrutikoetxea";
        $usuario->correo ='admin@gmail.com';
        $usuario->transporte = 'No';
        $usuario->tipo = 'Admin';
        $usuario->password = Hash::make('123456Aa');

        $usuario->save();

        // DB::table('users')->insert([
        //     'nombre' => "mikel",
        //     'apellido' => "urrutikoetxea",
        //     'correo' => 'urruti00@gmail.com',
        //     'transporte' => 'No',
        //     'password' => Hash::make('123456Aa'),
        // ]);

    }
}
