<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportePagoClinica extends Model
{
    use HasFactory;
    protected $table = 'reportes_pagos_clinicas';

    protected $fillable = ['transaccion_id','banco_emisor','banco_receptor','nmro_referencia','monto_pagado','metodo_transaccion','total','ingreso','egreso','credito','fecha_transaccion','fecha_vence_transaccion','estado','facturas_clinicas_id','pedidos_clinicas_id'];
}
