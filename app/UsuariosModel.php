<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;


class UsuariosModel extends Model 
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idusuario';
    protected $fillable =  [
            'nombre',
            'apellido_paterno',
            'apellido_materno',
            'correo',
            'contraseña',
            'confirma_contraseña',
            'idarea',
            'idperfil',
            'activo',
        ];
        
        public function solicitudes(){
            return $this->hasMany(SolicitudesModel::class);
        }
        public function getJWTIdentifier()

        {

        return $this->getKey();

        }

        public function getJWTCustomClaims()

        {

        return [];

        }
}
