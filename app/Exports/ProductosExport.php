<?php

namespace App\Exports;

use App\ProductosModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;


class ProductosExport implements FromCollection
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection() 
    {
        
        return ProductosModel::all();
        
        
    }
    
}
