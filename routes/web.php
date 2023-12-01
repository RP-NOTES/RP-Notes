<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\PublicacionController;
use App\Models\Clase;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/', 'login')->name('login');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/inicio', function () {
        $inscripciones = Inscripcion::with('clase.usuario')->where('idUser', Auth::user()->id)->get();

        return view('modulos.inicio', ['inscripciones' => $inscripciones]);
    })->name('inicio');

    Route::resource('/clases', ClaseController::class);
    Route::resource('/publicaciones', PublicacionController::class);

    Route::get('/aumentar-like-publicación/{idPublicacion}/{idClase}', [PublicacionController::class, 'aumentarLikePublicacion'])->name("aumentarLikePublicacion");
    Route::get('/descargar-archivo/{idPublicacion}', [PublicacionController::class, 'descargarArchivo'])->name("descargarArchivo");
    Route::get('/canjear-codigo', [ClaseController::class, 'canjearCodigo'])->name("canjearCodigo");
    Route::post('/realizar-inscripcion', [ClaseController::class, 'realizarInscripcion'])->name("realizarInscripcion");
});
