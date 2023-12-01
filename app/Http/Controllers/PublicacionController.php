<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicacionController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
            'image' => 'image',
            'file' => 'file',
            'idClase' => 'required'
        ]);

        $publicacion = new Publicacion();
        $publicacion->titulo = $request->titulo;
        $publicacion->contenido = $request->contenido;
        $publicacion->idClase = $request->idClase;

        if ($request->hasFile('image')) {
            $generatedImageName = date('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();
            Storage::disk('local')->put('images/' . $generatedImageName, file_get_contents($request->file('image')));
            $publicacion->nombreImagen = $generatedImageName;
        }

        if ($request->hasFile('file')) {
            $generatedFileName = date('YmdHis') . '.' . $request->file('file')->getClientOriginalExtension();
            Storage::disk('local')->put('files/' . $generatedFileName, file_get_contents($request->file('file')));
            $publicacion->nombreArchivo = $generatedFileName;
        }

        $publicacion->save();

        return redirect()->route('clases.show', ['clase' => $request->idClase])->with('success', 'Publicación creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function aumentarLikePublicacion($idPublicacion, $idClase)
    {
        $publicacion = Publicacion::find($idPublicacion);
        $publicacion->contadorLikes++;
        $publicacion->save();

        return redirect()->route('clases.show', ['clase' => $idClase]);
    }
}