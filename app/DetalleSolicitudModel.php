<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleSolicitudModel extends Model
{
    protected $table = 'detalle_solicitud';
    protected $primaryKey = 'id_detalle';
    protected $fillable =  [
            'codigo_solicitud',
            'codigo_producto',
            'cantidad',
            'created_at',
            'updated_at',
        ];
        public function producto(){
            return $this->belongsTo(ProductosModel::class);
        }
        
}
