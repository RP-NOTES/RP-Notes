<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modulos.clases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $clase = new Clase();
        $clase->nombre = $request->nombre;
        $clase->codigo = 'CL' . uniqid();
        $clase->idUser = Auth::getUser()->id;
        $clase->save();

        $inscripcion = new Inscripcion();
        $inscripcion->idUser = Auth::getUser()->id;
        $inscripcion->idClase = $clase->id;
        $inscripcion->save();

        return redirect()->route('inicio')->with('success', 'Clase creada correctamente codigo: ' . $clase->codigo);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $clase = Clase::with('publicaciones')->find($id);
        return view('modulos.clases.show', ['clase' => $clase]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
