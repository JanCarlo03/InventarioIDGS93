<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IniciosModel extends Model
{
    protected $table = 'bitacora_accesos';
    protected $primaryKey = 'idacceso';
    protected $fillable =  [
            'idusuario',
        ];
}
