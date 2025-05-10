<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['transaccion_id','total','sub_total','iva','factura_id','plan','ticket','fecha_pedido','fecha_vence_pedido','fecha_transaccion','fecha_vence_transaccion','metodo_transaccion','estado','created_at','updated_at'];
    
    //Relacion inversa uno a muchos
    public function factura(){
        return $this->belongsTo('App\Models\Factura');
    }
    //Relacion inversa uno  uno
    public function reporte_pago(){
        return $this->belongsToMany('App\Models\ReportePago');
    }
}
