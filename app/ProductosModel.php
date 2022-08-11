<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'idproducto';
    protected $fillable =  [
            'codigo_producto',
            'nombre_producto',
            'cantidad',
            'idcategoria',
            'activo',
        ];

        public function scopeProductos($query){

            return $query;
        }
}
