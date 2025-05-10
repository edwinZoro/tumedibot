<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','apellido','celular','ci_rif','pais','estado','ciudad','direccion','codigo_postal','user_id','plan']; 
    
        //Relacion inversa uno  uno
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
        //Relacion uno a muchos
    public function pedido(){
        return $this->hasMany('App\Models\Pedido');
        
    }
}
