<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreasModel extends Model
{
    protected $table = 'areas';
    protected $primaryKey = 'idarea';
    protected $fillable =  [
            'nombre_area',
            'activo',
        ];
}
