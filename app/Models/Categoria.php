<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['cod_cat', 'cod_subcat', 'nombre', 'estado'];
}
