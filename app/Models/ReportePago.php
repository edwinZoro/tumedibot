<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportePago extends Model
{
    use HasFactory;
    protected $fillable = [
    'transaccion_id',
    'banco_emisor',
    'banco_receptor',
    'nmro_referencia',
    'monto_pagado',
    'metodo_transaccion',
    'total',
    'ingreso',
    'egreso',
    'credito',
    'fecha_transaccion',
    'fecha_vence_transaccion',
    'pedidos_id',
    'estado',
    'factura_id'
    ];
    
    //Relacion uno a uno
    public function pedido(){
        return $this->hasMany('App\Models\Pedido');
    }
}
