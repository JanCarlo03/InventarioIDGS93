<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilesModel extends Model
{
    protected $table = 'perfiles';
    protected $primaryKey = 'idperfil';
    protected $fillable =  [
            'nombre',
            'idpermiso',
        ];
}
