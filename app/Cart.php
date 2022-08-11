<?php

namespace App;
class Cart 
{
    public $items = null;
    public $totalQty = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
        }
    }

    public function add($item, $id){
        $storedItem = ['qty'=> 0, 'item'=>$item];
        if($this->items){
            if(array_key_exists($id, $this-> items)){
                $storedItem = $this->items[$id];
            }
        }
        
        $storedItem['qty']++;
        
        $this->items[$id] = $storedItem;
        
        $this->totalQty++;
        //dd($this->items[$id]['qty']);
        //dd($this->items[$id]);
        

        
        $usu = DetalleSolicitudModel::create(array(
            'codigo_solicitud' => 1,
            'codigo_producto' => $this->items[$id]['item']['codigo_producto'],
            'cantidad' => $this->items[$id]['qty'],
          ));
        
    }

}
