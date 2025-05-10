<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoClinica extends Model
{
    use HasFactory;
    protected $table = 'pedidos_clinicas';

    protected $fillable = ['transaccion_id','total','sub_total','iva','facturas_clinicas_id','plan','ticket','fecha_pedido','fecha_vence_pedido','estado'];
}
