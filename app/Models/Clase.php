<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    public function usuario()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function publicaciones()
    {
        return $this->hasMany(Publicacion::class, 'idClase');
    }
}
