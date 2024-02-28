<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nif')->paginate(10);
        return view('admin.clientes.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::latest()->paginate(10);
        $cliente = new Cliente();
        return view('admin.clientes.create')
            ->with('clientes',$clientes)
            ->with('cliente', $cliente);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
//                'nif'=>'required|unique:clientes|min:8|max:12',
            ]
        );

        $requestData = $request->all();

        if ($request->hasFile('foto')) {
            $pathDestino = Storage::path(env('DIR_UPLOAD_CLIENTES_FOTOS'));

            $file = $request->file('foto');
            $extension = $file->extension();

            # Otras opciones para nombrar el fichero
            //$uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
            //$fileName = $uuid . '_' . $file->getClientOriginalName(). '.'. $extension;
            //$fileName = $uuid . '_' . $requestData['nif']. '.'. $extension;

            $fileName = $requestData['nif']. '.'. $extension;
            $request->file('foto')->move($pathDestino, $fileName);
            $requestData['foto'] = $fileName;
        }
        try {
            $cliente = Cliente::create($requestData);
            return to_route('admin.clientes.create')
                ->with(['alert-success' => 'El cliente ha sido guardado']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['alert-error' => 'El cliente no ha sido guardado']);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        $clientes = Cliente::orderBy('nif')->paginate(10);
        return view('admin.clientes.show')
            ->with('clientes', $clientes)
            ->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        $clientes = Cliente::orderBy('updated_at','desc')->paginate(10);
        return view('admin.clientes.edit')
            ->with('clientes', $clientes)
            ->with('cliente', $cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate(
            [
                'nif'=>'required|min:8|max:12',
                'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $requestData = $request->all();

        if ($request->hasFile('foto')) {

            // Borra  la foto anterior
            if ($cliente->foto) {
                $pathDestino = env('DIR_UPLOAD_CLIENTES_FOTOS');
                Storage::delete($pathDestino . $cliente->foto);
            }

            $pathDestino = Storage::path(env('DIR_UPLOAD_CLIENTES_FOTOS'));

            $file = $request->file('foto');
            $extension = $file->extension();

            # Otras opciones para nombrar el fichero
            //$uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
            //$fileName = $uuid . '_' . $file->getClientOriginalName(). '.'. $extension;
            //$fileName = $uuid . '_' . $requestData['nif']. '.'. $extension;

            $fileName = $requestData['nif']. '.'. $extension;
            $request->file('foto')->move($pathDestino, $fileName);
            $requestData['foto'] = $fileName;
        }

        try {
            $cliente->update($requestData);
            return to_route('admin.clientes.index')
                ->with(['alert-success' => 'El cliente ha sido modificado']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with(['alert-error' => 'El cliente no ha sido modificado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();
            return to_route('admin.clientes.index')
                ->with(['alert-success' => 'El cliente ha sido eliminado']);
        } catch(\Exception $e){
            return to_route('admin.clientes.index')
                ->with(['alert-error' => 'El cliente no ha sido eliminado']);
        }
    }


    //------------------------
    public function filtro(Request $request)
    {
        $requestData = $request->all();
        $clientes = Cliente::orderBy('nif');
        if (isset($requestData['filtroNombre'])) {
            $clientes = $clientes
                ->where('nombre', 'like', '%' . $requestData['filtroNombre'] . '%');
        }
        if (isset($requestData['filtroApellido1'])) {
            $clientes = $clientes
                ->where('apellido1', 'like', '%' . $requestData['filtroApellido1'] . '%');
        }
        if (isset($requestData['filtroApellido2'])) {
            $clientes = $clientes
                ->where('apellido2', 'like', '%' . $requestData['filtroApellido2'] . '%');
        }
        $clientes = $clientes->paginate(10);
        return view('admin.clientes.index')
            ->with('clientes', $clientes);
    }
}
