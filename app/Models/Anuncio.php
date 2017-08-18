<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncios';
    protected $fillable = ['cod_cat', 'cod_emp', 'encabezado', 'texto', 'imagen', 'duracion', 'destacado', 'estado'];
}
