<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriasModel extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'idcategoria';
    protected $fillable =  [
            'nombre_categoria',
            'activo',
        ];
}
