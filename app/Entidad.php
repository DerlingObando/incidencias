<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\Promise\all;

class Entidad extends Model
{
    protected $table = 'entidades';

    protected $fillable = ['entidad'];

}
