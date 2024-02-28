<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Viaje;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory()->create([
//             'name' => 'Francisco Javier García',
//             'email' => 'javier@gmail.com',
//             'password'=> Hash::make('castelar')
//         ]);

         \App\Models\User::factory(10)->create();

//        Cliente::factory(50)->create();
        $this->call([ClientesSeeder::class]);

        Empleado::factory()->count(10)->create();
        Viaje::factory()->count(50)->create();

        $this->call([InscripcionViajeSeeder::class]);

    }
}
