<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class SolicitudesModel extends Model
{
    protected $table = 'solicitudes';
    protected $primaryKey = 'codigo_solicitud';
    protected $fillable =  [
            'idsolicitud',
            'idusuario',
            'idestatus',
            'created_at',
            'updated_at',
        ];
         
        public function detalle_solicitud(){
            return $this->belongsToMany(ProductosModel::class, 'detalle_solicitud','codigo_solicitud','idproducto');
        }
        public function usuarios(){
            return $this->belongsTo(UsuariosModel::class);
        }
       
}

