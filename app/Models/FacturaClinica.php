<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaClinica extends Model
{
    use HasFactory;

    protected $table = 'facturas_clinicas';

    protected $fillable = ['tipo_negocio','nombre_negocio','rif_negocio','nombre_representante','apellido_representante','celular','ci_rif','pais','estado','ciudad','direccion','codigo_postal','plan','user_id'];
}
