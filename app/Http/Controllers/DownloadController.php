<?php

namespace App\Http\Controllers;

use App\Models\Cliente;

use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function downloadImageCliente($id)
    {
        $cliente = Cliente::find($id);
        $rutaArchivo = env('DIR_UPLOAD_CLIENTES_FOTOS') . $cliente->foto;
//        dd($rutaArchivo);
        $contenido = Storage::get($rutaArchivo);
        $tipoContenido = Storage::mimeType($rutaArchivo);

        return response($contenido)->header('Content-Type', $tipoContenido);
    }

    public function showImage($type,$id)
    {
        switch($type) {
            case "cliente":
                $cliente = Cliente::find($id);
                $rutaArchivo = env('DIR_UPLOAD_CLIENTES_FOTOS') . $cliente->foto;
                break;
        }

        $contenido = Storage::get($rutaArchivo);
        $tipoContenido = Storage::mimeType($rutaArchivo);

        return response($contenido)->header('Content-Type', $tipoContenido);
    }
}
