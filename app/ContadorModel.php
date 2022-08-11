<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContadorModel extends Model
{
    protected $table = 'contador';
    protected $primaryKey = 'id';
    protected $fillable =  [
            'numero',
        ];
}
