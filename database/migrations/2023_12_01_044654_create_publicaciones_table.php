<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->text("contenido");
            $table->integer("contadorLikes")->default(0);
            $table->string("nombreImagen")->nullable()->default(null);
            $table->string("nombreArchivo")->nullable()->default(null);
            $table->timestamps();

            $table->unsignedBigInteger("idClase");
            $table->unsignedBigInteger("idUser");

            $table->foreign("idClase")->references("id")->on("clases");
            $table->foreign("idUser")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicaciones');
    }
};
