<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoIncidencia extends Model
{
    protected $table = 'tipo_incidencias';

    protected $fillable = ['tipo'];

}
