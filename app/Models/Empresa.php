<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $fillable = ['cod_emp', 'nombre', 'direc', 'telf1', 'telf2', 'correo', 'estado'];
}
