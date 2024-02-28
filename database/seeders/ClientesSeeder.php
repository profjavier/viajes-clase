<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as FakerFactory;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        for($i=0; $i<50;$i++) {
            Cliente::create(
                [
                    'nif' => $faker->unique()->regexify('[0-9]{8}[A-Z]'),
                    'nombre' => $faker->firstname(),
                    'apellido1' => $faker->lastname(),
                    'apellido2' => $faker->optional(0.8)->lastname(),
                    'fecha_nacimiento' => $faker->date('Y-m-d', 'now'),
                    'foto' => null,
                    'observaciones' => $faker->optional(0.8)->text,
                ]
            );
        }

        # Carga la lista de imagenes por defecto
        $pathFotosDefault = public_path('images/default-fotos');
        $fotosFaker = glob($pathFotosDefault . '/*');

        # Directorio de destino de las fotos de clientes
        $pathDestino =env('DIR_UPLOAD_CLIENTES_FOTOS');
        # Crea recursivamente el directorio destino con los permisos 775
        File::makeDirectory(Storage::path($pathDestino), 0775, true, true);

        $clientes = Cliente::all();
        foreach ($clientes as $cliente) {
            $pathOrigen = $faker->randomElement($fotosFaker);
            $extension = pathinfo($pathOrigen, PATHINFO_EXTENSION);
            $filenameFoto = $cliente->nif.'.'.$extension;

            File::copy("public/images/default-fotos/us02.png",Storage::path($pathDestino.$filenameFoto));
            $cliente->foto = $filenameFoto;
            $cliente->save();
        }
    }
}
