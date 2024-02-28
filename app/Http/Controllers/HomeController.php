<?php

namespace App\Http\Controllers;

use App\Models\Viaje;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        $viajes = Viaje::all();
        $viajes = Viaje::where('salida','>=',now())
                    ->orderBy('salida')->paginate(10);
        $viajes = Viaje::orderBy('salida')->paginate(10);

        return view('welcome')
            ->with('viajes',$viajes);
    }
}
